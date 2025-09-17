#!/bin/bash

# Configurar nombre de proyecto consistente
export COMPOSE_PROJECT_NAME=laravel-scaffolding

echo "🛑 Deteniendo contenedores Docker..."
# Limpiar configuración de desarrollo local
docker-compose down 2>/dev/null || true

# Limpiar configuración de Docker Hub
docker compose -f docker-compose.hub.yml down 2>/dev/null || true

echo "🧹 Limpiando volúmenes y redes..."
docker-compose down -v --remove-orphans 2>/dev/null || true
docker compose -f docker-compose.hub.yml down -v --remove-orphans 2>/dev/null || true

echo "🗑️ Eliminando imágenes de la aplicación..."
docker rmi laravel-scaffolding 2>/dev/null || true
docker rmi imorlab/laravel-scaffolding:latest 2>/dev/null || true

echo "🧽 Limpiando contenedores específicos..."
docker stop laravel-scaffolding-app laravel-scaffolding-webserver laravel-scaffolding-db laravel-scaffolding-redis laravel-scaffolding-phpmyadmin 2>/dev/null || true

docker rm laravel-scaffolding-app laravel-scaffolding-webserver laravel-scaffolding-db laravel-scaffolding-redis laravel-scaffolding-phpmyadmin 2>/dev/null || true

echo "🗄️ Limpiando volúmenes persistentes..."
docker volume rm laravel-scaffolding_dbdata laravel-scaffolding_app_public 2>/dev/null || true
docker volume rm laravel-scaffolding-2025_dbdata laravel-scaffolding-2025_app_public 2>/dev/null || true

echo "🌐 Limpiando redes..."
docker network rm laravel-scaffolding_laravel-network 2>/dev/null || true
docker network rm laravel-scaffolding-2025_laravel-network 2>/dev/null || true

echo "✅ Limpieza completada!"
