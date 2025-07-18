# Laravel Scaffolding 2026

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Acerca del proyecto

Este es un proyecto de scaffolding (estructura base) para Laravel 12, configurado con las últimas tecnologías y mejores prácticas para el desarrollo web moderno. Incluye configuraciones preestablecidas para Livewire, Tailwind CSS 4 y soporte multiidioma, permitiéndote comenzar a desarrollar rápidamente sin preocuparte por la configuración inicial.

## Características principales

- **Laravel 12.19.3**: La última versión del framework PHP más elegante
- **Laravel Breeze**: Sistema de autenticación con login, registro y panel de usuario
- **Tailwind CSS 4**: Con modo oscuro/claro gestionado por Alpine.js
- **Alpine.js**: Para interactividad en el frontend sin dependencias pesadas
- **Livewire**: Para interfaces dinámicas sin escribir JavaScript
- **Laravel Livewire Tables**: Tablas dinámicas con ordenación, filtrado y búsqueda
- **Localización avanzada**: Implementada con mcamara/laravel-localization
- **SEO optimizado**: Integración con artesaos/seotools para metadatos
- **Laravel Gzip**: Compresión de respuestas HTTP para mejor rendimiento
- **Gestión de roles y permisos**: Implementada con spatie/laravel-permission
- **Gestión de actividad**: Implementada con spatie/laravel-activitylog
- **Estructura de carpetas optimizada**: Organización clara para un desarrollo escalable
- **Componentes Blade**: Estructura modular con componentes reutilizables

## Estructura de carpetas

```
├── app/                # Lógica principal de la aplicación
│   ├── Http/          # Controladores, Middleware, etc.
│   ├── Models/        # Modelos Eloquent
│   ├── Providers/     # Proveedores de servicios
│   └── View/          # Componentes de vista
├── resources/         # Recursos frontend
│   ├── css/           # Archivos CSS (incluye configuración Tailwind)
│   ├── js/            # JavaScript
│   └── views/         # Vistas Blade
│       ├── components/  # Componentes Blade reutilizables
│       ├── front/       # Vistas frontend públicas
│       ├── layouts/     # Plantillas de diseño
│       └── partials/    # Fragmentos de vista parciales
├── lang/              # Archivos de idioma
│   ├── en/            # Traducciones en inglés
│   └── es/            # Traducciones en español
└── public/            # Archivos públicos accesibles desde la web
```

## Configuración de Tailwind CSS 4

El proyecto utiliza Tailwind CSS 4 con las siguientes características:

- **Modo oscuro**: Implementado con Alpine.js y persistencia en localStorage
- **Toggle de tema**: Botón para alternar entre modo claro/oscuro en la navegación
- **Detección de preferencias**: Usa preferencias del sistema si no hay selección guardada
- **Colores personalizados**: Paleta personalizada definida en `resources/css/app.css`:
  - `light`: #F8F7F7
  - `dark`: #1D1E1E
  - `beige`: #D8C1AB
  - `coral`: #F7896F
  - `blue`: #0D5BCE
  - `green`: #16C178
- **Integración con Vite**: Configurado con el plugin oficial `@tailwindcss/vite`

## Soporte multiidioma

El proyecto está configurado para soportar múltiples idiomas utilizando el paquete `mcamara/laravel-localization`:

- **Idiomas disponibles**: Español (es) e Inglés (en)
- **Archivos de traducción**: Organizados en la carpeta `lang/`
- **URLs localizadas**: Prefijos de idioma en las URLs (ej: `/es/`, `/en/`)
- **Configuración**: Archivo `config/laravellocalization.php`
- **Middleware**: Redirección automática y persistencia de idioma en sesión
- **Componente de selección de idioma**: Implementado con Alpine.js en `resources/views/components/language-selector.blade.php`

## Laravel Breeze

El proyecto incluye Laravel Breeze para proporcionar un sistema de autenticación completo y elegante:

- **Autenticación completa**: Login, registro, recuperación de contraseña y verificación de email
- **Panel de usuario**: Dashboard personalizado para usuarios autenticados
- **Gestión de perfil**: Actualización de datos personales y contraseña
- **Integración con Tailwind CSS**: Diseño elegante y responsive
- **Compatibilidad con modo oscuro**: Todas las vistas de autenticación adaptadas al tema claro/oscuro
- **Integración con localización**: Rutas y textos traducibles en múltiples idiomas

## Laravel Livewire Tables

El proyecto integra el paquete `rappasoft/laravel-livewire-tables` para crear tablas dinámicas con funcionalidades avanzadas:

- **Tablas dinámicas**: Componentes Livewire para mostrar datos tabulares
- **Ordenación**: Ordenar por cualquier columna en orden ascendente o descendente
- **Filtrado**: Filtros personalizables para refinar los datos mostrados
- **Búsqueda**: Búsqueda global en todas las columnas o específica por columna
- **Paginación**: Control de registros por página con opciones configurables
- **Selección de columnas**: Permite al usuario mostrar/ocultar columnas según necesidad
- **Acciones en fila**: Botones de acción personalizables para cada registro
- **Integración con Tailwind**: Diseño elegante y responsive
- **Compatibilidad con modo oscuro**: Tablas adaptadas al tema claro/oscuro

Ejemplo implementado en el dashboard con tabla de usuarios que incluye:
- Filtrado por estado de verificación de email
- Ordenación por ID, nombre, email y fechas
- Búsqueda global en todos los campos
- Botones de acción (Ver, Editar, Eliminar)

## Componentes incluidos

- **Layout principal**: Con soporte para modo oscuro y estructura responsive
- **Componente Hero**: Con animaciones CSS tipo "lava lamp"
- **Navegación**: Menú responsive con soporte para modo oscuro
- **Footer**: Componente de pie de página configurable
- **Selector de tema**: Toggle para cambiar entre modo claro/oscuro

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y NPM

## Instalación

1. Clona este repositorio
2. Ejecuta `composer install`
3. Ejecuta `npm install`
4. Copia `.env.example` a `.env` y configura tus variables de entorno
5. Ejecuta `php artisan key:generate`
6. Ejecuta `npm run dev` para desarrollo o `npm run build` para producción

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).
# zig-zag-2026
