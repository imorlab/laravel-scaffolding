# Guía Completa: Dockerización de Proyecto Laravel 🐳

Esta guía te ayudará a dockerizar tu proyecto Laravel paso a paso de forma sencilla.

## 📋 Prerrequisitos

Antes de comenzar, asegúrate de tener instalado:
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) para Windows
- [Docker Compose](https://docs.docker.com/compose/install/) (incluido con Docker Desktop)

## 🏗️ Arquitectura de la Solución

Nuestro setup de Docker incluye:
- **app**: Contenedor PHP 8.2-FPM con Laravel
- **webserver**: Servidor web Nginx
- **db**: Base de datos MySQL 8.0
- **redis**: Servidor de cache Redis
- **phpmyadmin**: Interfaz web para gestionar MySQL

## 📁 Archivos Creados

Los siguientes archivos han sido creados para la dockerización:

```
proyecto/
├── Dockerfile                    # Imagen de la aplicación Laravel
├── docker-compose.yml           # Configuración de servicios
├── .dockerignore               # Archivos a ignorar en Docker
├── .env.docker                 # Variables de entorno para Docker
├── docker-setup.sh            # Script de configuración automática
├── docker-cleanup.sh          # Script de limpieza
└── docker-compose/
    └── nginx/
        └── travellist.conf     # Configuración de Nginx
```

## 🚀 Pasos para Dockerizar

### Paso 1: Preparar el Entorno

1. Abre una terminal en la raíz del proyecto
2. Asegúrate de que Docker Desktop esté ejecutándose

### Paso 2: Configuración Automática (Recomendado)

Ejecuta el script de configuración automática:

```bash
# En Windows con Git Bash
bash docker-setup.sh

# O ejecuta paso a paso manualmente (ver Paso 3)
```

### Paso 3: Configuración Manual

Si prefieres hacerlo paso a paso:

#### 3.1 Crear archivo .env
```bash
cp .env.docker .env
```

#### 3.2 Construir y levantar contenedores
```bash
docker-compose up -d --build
```

#### 3.3 Configurar Laravel
```bash
# Generar clave de aplicación
docker-compose exec app php artisan key:generate

# Ejecutar migraciones
docker-compose exec app php artisan migrate

# Crear enlace simbólico para storage
docker-compose exec app php artisan storage:link

# Limpiar cache
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Ejecutar seeders
docker-compose exec app php artisan db:seed
```

## 🌐 Acceso a la Aplicación

Una vez completada la configuración:

- **Aplicación Laravel**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8080
  - Servidor: `db`
  - Usuario: `laravel_user`
  - Contraseña: `user_password`

## 🛠️ Comandos Útiles

### Gestión de contenedores
```bash
# Ver estado de contenedores
docker-compose ps

# Ver logs de un servicio específico
docker-compose logs app
docker-compose logs webserver

# Reiniciar un servicio
docker-compose restart app

# Entrar a un contenedor
docker-compose exec app bash
docker-compose exec db mysql -u root -p
```

### Comandos Laravel dentro del contenedor
```bash
# Ejecutar comandos Artisan
docker-compose exec app php artisan migrate
docker-compose exec app php artisan make:controller TestController

# Instalar dependencias
docker-compose exec app composer install
docker-compose exec app npm install

# Limpiar cache
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
```

### Gestión de base de datos
```bash
# Backup de la base de datos
docker-compose exec db mysqldump -u laravel_user -puser_password laravel_scaffolding > backup.sql

# Restaurar base de datos
docker-compose exec -T db mysql -u laravel_user -puser_password laravel_scaffolding < backup.sql
```

## 🔄 Desarrollo Diario

### Iniciar el entorno de desarrollo
```bash
docker-compose up -d
```

### Detener el entorno
```bash
docker-compose down
```

### Detener y limpiar completamente
```bash
bash docker-cleanup.sh
```

## 🐛 Solución de Problemas Comunes

### Error de permisos
```bash
# Cambiar permisos de storage y bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

### Puerto ocupado
Si el puerto 8000 está ocupado, modifica `docker-compose.yml`:
```yaml
ports:
  - "8001:80"  # Cambiar 8000 por 8001
```

### Reconstruir contenedores tras cambios
```bash
docker-compose down
docker-compose up -d --build
```

### Limpiar todo y empezar de nuevo
```bash
bash docker-cleanup.sh
bash docker-setup.sh
```

## 📊 Monitoreo

### Ver uso de recursos
```bash
docker stats
```

### Ver logs en tiempo real
```bash
docker-compose logs -f app
```

## 🔒 Configuración de Producción

Para producción, modifica:

1. **Dockerfile**: Cambia `APP_ENV=production`
2. **docker-compose.yml**: Quita el mapeo de volúmenes de código
3. **Variables de entorno**: Usa secretos seguros

## 📝 Notas Importantes

- Los datos de MySQL persisten en un volumen Docker
- Los archivos de código se sincronizan automáticamente durante el desarrollo
- Redis se usa para cache y sesiones
- Nginx actúa como proxy hacia PHP-FPM

### Paso 8: Configuración Final y Pruebas

#### 8.1 Hacer los scripts ejecutables

```bash
# Hacer los scripts ejecutables
chmod +x docker-setup.sh docker-cleanup.sh install.sh

# Verificar permisos
ls -la *.sh
```

#### 8.2 Configurar variables de entorno

Asegúrate de que tu archivo `.env` tenga la configuración correcta para Docker:

```env
# Configuración de base de datos para Docker
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_scaffolding
DB_USERNAME=root
DB_PASSWORD=root_password
```

#### 8.3 Iniciar los servicios

```bash
# Opción 1: Usar el script automatizado
./docker-setup.sh

# Opción 2: Iniciar manualmente
docker compose up -d
```

#### 8.4 Configurar la aplicación Laravel

Una vez que los contenedores estén funcionando:

```bash
# Esperar a que MySQL se inicie completamente (unos 20 segundos)
sleep 20

# Ejecutar migraciones
docker compose exec app php artisan migrate

# Ejecutar seeders
docker compose exec app php artisan db:seed

# Crear enlace simbólico para storage (si es necesario)
docker compose exec app php artisan storage:link

# Limpiar cache
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan route:clear
docker compose exec app php artisan view:clear
```

#### 8.5 Verificar que todo funciona

```bash
# Verificar contenedores en ejecución
docker ps

# Probar la conexión a la aplicación
curl http://localhost:8000

# Ver logs si hay problemas
docker compose logs app
docker compose logs db
```

---

## � Acceso a los Servicios

Una vez que todo esté funcionando, podrás acceder a:

- **Aplicación Laravel**: [http://localhost:8000](http://localhost:8000)
- **phpMyAdmin**: [http://localhost:8080](http://localhost:8080)
- **Base de datos MySQL**: `localhost:3307`

### Credenciales de Base de Datos

- **Host**: localhost (desde tu máquina) o `db` (desde otros contenedores)
- **Puerto**: 3307 (desde tu máquina) o 3306 (desde otros contenedores)
- **Base de datos**: laravel_scaffolding
- **Usuario root**: root
- **Contraseña root**: root_password
- **Usuario regular**: laravel_user
- **Contraseña regular**: user_password

---

## 🛠️ Comandos Útiles

### Gestión de Contenedores

```bash
# Iniciar todos los servicios
docker compose up -d

# Detener todos los servicios
docker compose down

# Ver logs en tiempo real
docker compose logs -f

# Ver logs de un servicio específico
docker compose logs app
docker compose logs db

# Reiniciar un servicio específico
docker compose restart app

# Acceder al shell del contenedor de la aplicación
docker compose exec app bash

# Acceder al shell del contenedor de base de datos
docker compose exec db mysql -u root -p
```

### Comandos de Laravel en Docker

```bash
# Ejecutar comandos de Artisan
docker compose exec app php artisan [comando]

# Ejemplos específicos:
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
docker compose exec app php artisan cache:clear
docker compose exec app php artisan queue:work

# Ejecutar Composer
docker compose exec app composer install
docker compose exec app composer update

# Ejecutar NPM
docker compose exec app npm install
docker compose exec app npm run build
docker compose exec app npm run dev
```

### Comandos de Base de Datos

```bash
# Conectar a MySQL desde terminal
docker compose exec db mysql -u root -p

# Hacer backup de la base de datos
docker compose exec db mysqldump -u root -p laravel_scaffolding > backup.sql

# Restaurar backup
docker compose exec -i db mysql -u root -p laravel_scaffolding < backup.sql
```

---

## 🔧 Solución de Problemas Comunes

### Problema: Puerto ocupado
**Error**: `Port already in use`  
**Solución**: Cambiar el puerto en `docker-compose.yml` o detener el servicio que usa ese puerto.

### Problema: No se puede conectar a la base de datos
**Posibles causas y soluciones**:
1. Verificar que el contenedor de MySQL esté funcionando: `docker compose ps`
2. Verificar la configuración en `.env`
3. Esperar a que MySQL se inicie completamente (puede tomar 30-60 segundos)

### Problema: Permisos de archivos
**Solución**: 
```bash
# Ejecutar dentro del contenedor
docker compose exec app chown -R www:www /var/www
docker compose exec app chmod -R 775 /var/www/storage
docker compose exec app chmod -R 775 /var/www/bootstrap/cache
```

### Problema: Cache de aplicación
**Solución**:
```bash
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan route:clear
docker compose exec app php artisan view:clear
```

---

## 🔄 Mantenimiento

### Actualizar la aplicación

```bash
# 1. Hacer backup de la base de datos
docker compose exec db mysqldump -u root -p laravel_scaffolding > backup_$(date +%Y%m%d_%H%M%S).sql

# 2. Detener servicios
docker compose down

# 3. Hacer pull de cambios del código
git pull origin main

# 4. Reconstruir imagen si es necesario
docker compose build app

# 5. Iniciar servicios
docker compose up -d

# 6. Ejecutar migraciones si hay nuevas
docker compose exec app php artisan migrate

# 7. Limpiar cache
docker compose exec app php artisan cache:clear
```

### Limpieza de Docker

```bash
# Usar el script de limpieza
./docker-cleanup.sh

# O manualmente:
docker compose down
docker system prune -f
docker volume prune -f
```

## �🎯 Próximos Pasos

1. Configurar SSL/HTTPS con Let's Encrypt
2. Añadir Elasticsearch para búsquedas
3. Configurar CI/CD con GitHub Actions
4. Implementar monitoring con Prometheus
5. Configurar backup automatizado de la base de datos

---

¡Dockerizado! 🐳
