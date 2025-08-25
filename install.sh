#!/bin/bash

# Script de instalación para Laravel Scaffolding 2026
# Autor: Beon World Wide

echo "🚀 Iniciando instalación de Laravel Scaffolding 2026..."
echo ""

# Verificar si existe PHP
if ! command -v php &> /dev/null; then
    echo "❌ PHP no está instalado. Por favor, instala PHP 8.2 o superior."
    exit 1
fi

# Verificar si existe Composer
if ! command -v composer &> /dev/null; then
    echo "❌ Composer no está instalado. Por favor, instala Composer desde https://getcomposer.org/"
    exit 1
fi

# Verificar si existe Node.js
if ! command -v node &> /dev/null; then
    echo "❌ Node.js no está instalado. Por favor, instala Node.js desde https://nodejs.org/"
    exit 1
fi

# Verificar si existe NPM
if ! command -v npm &> /dev/null; then
    echo "❌ NPM no está instalado. Por favor, instala NPM."
    exit 1
fi

echo "✅ Todas las dependencias del sistema están instaladas."
echo ""

# Instalar dependencias de PHP con Composer
echo "📦 Instalando dependencias de PHP con Composer..."
composer install --no-dev --optimize-autoloader
if [ $? -eq 0 ]; then
    echo "✅ Dependencias de PHP instaladas correctamente."
else
    echo "❌ Error al instalar dependencias de PHP."
    exit 1
fi
echo ""

# Instalar dependencias de Node.js con NPM
echo "📦 Instalando dependencias de Node.js con NPM..."
npm install
if [ $? -eq 0 ]; then
    echo "✅ Dependencias de Node.js instaladas correctamente."
else
    echo "❌ Error al instalar dependencias de Node.js."
    exit 1
fi
echo ""

# Crear archivo .env si no existe
if [ ! -f .env ]; then
    echo "📄 Creando archivo .env desde .env.example..."
    cp .env.example .env
    echo "✅ Archivo .env creado."
else
    echo "⚠️  El archivo .env ya existe. No se sobrescribirá."
fi
echo ""

# Generar clave de aplicación
echo "🔑 Generando clave de aplicación..."
php artisan key:generate
if [ $? -eq 0 ]; then
    echo "✅ Clave de aplicación generada."
else
    echo "❌ Error al generar la clave de aplicación."
fi
echo ""

# Compilar assets para producción (opcional)
echo "🎨 ¿Deseas compilar los assets para producción? (y/N)"
read -r compile_assets
if [[ $compile_assets =~ ^[Yy]$ ]]; then
    echo "🎨 Compilando assets..."
    npm run build
    if [ $? -eq 0 ]; then
        echo "✅ Assets compilados para producción."
    else
        echo "❌ Error al compilar assets."
    fi
else
    echo "ℹ️  Para desarrollo, ejecuta: npm run dev"
fi
echo ""

echo "🎉 ¡Instalación completada exitosamente!"
echo ""
echo "📋 Próximos pasos:"
echo "   1. Configura tu base de datos en el archivo .env"
echo "   2. Ejecuta 'php artisan migrate' para crear las tablas"
echo "   3. Ejecuta 'php artisan db:seed' para poblar datos de prueba (opcional)"
echo "   4. Ejecuta 'php artisan serve' para iniciar el servidor de desarrollo"
echo "   5. Para desarrollo frontend, ejecuta 'npm run dev' en otra terminal"
echo ""
echo "🌐 Tu aplicación estará disponible en: http://localhost:8000"
echo ""
echo "¡Happy coding! 🚀"
