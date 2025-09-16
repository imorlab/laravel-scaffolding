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

echo "🐳 Iniciando servicios con imagen de Docker Hub..."
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
