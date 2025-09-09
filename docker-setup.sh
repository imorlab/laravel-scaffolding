#!/bin/bash

echo "🚀 Iniciando la configuración de Docker para Laravel..."

# Crear archivo .env si no existe
if [ ! -f .env ]; then
    echo "📄 Copiando archivo de configuración..."
    cp .env.docker .env
fi

# Construir e iniciar los contenedores
echo "🐳 Construyendo contenedores Docker..."
docker-compose up -d --build

# Esperar a que los servicios estén listos
echo "⏳ Esperando a que los servicios estén listos..."
sleep 30

# Generar clave de aplicación
echo "🔑 Generando clave de aplicación..."
docker-compose exec app php artisan key:generate

# Ejecutar migraciones
echo "🗄️ Ejecutando migraciones de base de datos..."
docker-compose exec app php artisan migrate

# Crear enlace simbólico para storage
echo "🔗 Creando enlace simbólico para storage..."
docker-compose exec app php artisan storage:link

# Limpiar cache
echo "🧹 Limpiando cache..."
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Ejecutar seeders si existen
echo "🌱 Ejecutando seeders..."
docker-compose exec app php artisan db:seed

echo "✅ ¡Docker setup completado!"
echo "🌐 Tu aplicación está disponible en: http://localhost:8000"
echo "🗄️ phpMyAdmin está disponible en: http://localhost:8080"
echo ""
echo "Credenciales de la base de datos:"
echo "- Usuario: laravel_user"
echo "- Contraseña: user_password"
echo "- Base de datos: laravel_scaffolding"
