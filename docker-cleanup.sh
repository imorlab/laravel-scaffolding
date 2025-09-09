#!/bin/bash

echo "🛑 Deteniendo contenedores Docker..."
docker-compose down

echo "🧹 Limpiando volúmenes y redes..."
docker-compose down -v --remove-orphans

echo "🗑️ Eliminando imágenes de la aplicación..."
docker rmi laravel-scaffolding 2>/dev/null || true

echo "✅ Limpieza completada!"
