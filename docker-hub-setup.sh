#!/bin/bash

echo "🐋 Iniciando Laravel Scaffolding desde Docker Hub..."
echo "📦 Descargando imagen desde imorlab/laravel-scaffolding..."

# Descargar la imagen más reciente
docker pull imorlab/laravel-scaffolding:latest

# Crear directorio de configuración si no existe
mkdir -p docker-compose/nginx

# Crear configuración básica de Nginx si no existe
if [ ! -f "docker-compose/nginx/default.conf" ]; then
    cat > docker-compose/nginx/default.conf << 'EOF'
server {
    listen 80;
    server_name localhost;
    root /var/www/public;
    index index.php index.html;
    
    # Servir archivos estáticos directamente
    location ~* \.(css|js|ico|png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        try_files $uri =404;
    }
    
    # Configuración específica para assets de Vite
    location /build/ {
        alias /var/www/public/build/;
        expires 1y;
        add_header Cache-Control "public, immutable";
        try_files $uri =404;
    }
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
EOF
fi

# Crear archivo docker-compose.hub.yml si no existe
if [ ! -f "docker-compose.hub.yml" ]; then
    cat > docker-compose.hub.yml << 'EOF'
services:
  # Servicio de la aplicación Laravel (usando imagen de Docker Hub)
  app:
    image: imorlab/laravel-scaffolding:latest
    container_name: laravel-scaffolding-app
    restart: unless-stopped
    working_dir: /var/www
    environment:
      - DB_HOST=db
      - DB_DATABASE=laravel_scaffolding
      - DB_USERNAME=root
      - DB_PASSWORD=root_password
      - REDIS_HOST=redis
      - APP_KEY=base64:Rq/Rr/mDA1w4vXOpjPOAp3U1vyBZXJpVcjRbcMiDWKE=
    volumes:
      - app_public:/var/www/public
    depends_on:
      - db
      - redis
    networks:
      - laravel-network

  # Servidor web Nginx
  webserver:
    image: nginx:alpine
    container_name: laravel-scaffolding-webserver
    restart: unless-stopped
    ports:
      - "8001:80"
    volumes:
      - ./docker-compose/nginx:/etc/nginx/conf.d
      - app_public:/var/www/public:ro
    depends_on:
      - app
    networks:
      - laravel-network

  # Base de datos MySQL
  db:
    image: mysql:8.0
    container_name: laravel-scaffolding-db
    restart: unless-stopped
    ports:
      - "3307:3306"
    environment:
      MYSQL_DATABASE: laravel_scaffolding
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_PASSWORD: user_password
      MYSQL_USER: laravel_user
      SERVICE_TAGS: dev
      SERVICE_NAME: mysql
    volumes:
      - dbdata:/var/lib/mysql
    networks:
      - laravel-network

  # Redis para cache y sesiones
  redis:
    image: redis:alpine
    container_name: laravel-scaffolding-redis
    restart: unless-stopped
    ports:
      - "6379:6379"
    networks:
      - laravel-network

  # phpMyAdmin
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: laravel-scaffolding-phpmyadmin
    restart: unless-stopped
    ports:
      - "8080:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: root_password
    depends_on:
      - db
    networks:
      - laravel-network

# Volumes
volumes:
  dbdata:
    driver: local
  app_public:
    driver: local

# Networks
networks:
  laravel-network:
    driver: bridge
EOF
fiecho "🐳 Iniciando servicios con imagen de Docker Hub..."
docker compose -f docker-compose.hub.yml up -d

echo "⏳ Esperando a que los servicios estén listos..."
sleep 30

echo "🗄️ Ejecutando migraciones..."
docker compose -f docker-compose.hub.yml exec app php artisan migrate --force

echo "🌱 Ejecutando seeders..."
docker compose -f docker-compose.hub.yml exec app php artisan db:seed --force

echo "🎨 Compilando assets del frontend..."
docker compose -f docker-compose.hub.yml exec app npm run build

echo "🧹 Limpiando cache..."
docker compose -f docker-compose.hub.yml exec app php artisan cache:clear
docker compose -f docker-compose.hub.yml exec app php artisan config:clear
docker compose -f docker-compose.hub.yml exec app php artisan view:clear

echo ""
echo "✅ ¡Setup desde Docker Hub completado!"
echo "🌐 Tu aplicación está disponible en: http://localhost:8001"
echo "🗄️ phpMyAdmin está disponible en: http://localhost:8080"
echo ""
echo "📦 Imagen utilizada: imorlab/laravel-scaffolding:latest"
echo "🔄 Para detener: docker compose -f docker-compose.hub.yml down"
