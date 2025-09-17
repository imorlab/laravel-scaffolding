# 🐳 Guía Laravel con Docker

Esta guía te explica cómo usar Laravel con Docker de forma simple y rápida.

## 📋 Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado
- Git (opcional)

## 🏗️ ¿Qué Incluye?

- **Laravel 11** con PHP 8.2
- **MySQL 8.0** para base de datos
- **Redis** para cache y sesiones
- **Nginx** como servidor web
- **phpMyAdmin** para administrar la BD

## 🚀 3 Formas de Usar

### 1️⃣ Docker Hub (Recomendado) ⭐

La forma más rápida, sin necesidad de clonar código.

**📝 Importante para Windows:**
- Usa **Git Bash** (recomendado) o **PowerShell**
- No uses Command Prompt (CMD)

**En Git Bash o PowerShell:**

```bash
# 1. Descargar script de setup
curl -o docker-hub-setup.sh https://raw.githubusercontent.com/imorlab/laravel-scaffolding/main/docker-hub-setup.sh

# 2. Darle permisos de ejecución
chmod +x docker-hub-setup.sh

# 3. Ejecutar el setup automático
./docker-hub-setup.sh
```

**Alternativa para Command Prompt (CMD):**

```cmd
# 1. Descargar con PowerShell embebido
powershell -Command "Invoke-WebRequest -Uri 'https://raw.githubusercontent.com/imorlab/laravel-scaffolding/main/docker-hub-setup.sh' -OutFile 'docker-hub-setup.sh'"

# 2. Ejecutar con Git Bash
"C:\Program Files\Git\bin\bash.exe" docker-hub-setup.sh
```

> 💡 **Recomendación**: Instala [Git para Windows](https://git-scm.com/download/win) y usa **Git Bash** para una mejor experiencia.

✅ **Ventajas**: Rápido, no necesita código fuente, setup automático

### 2️⃣ Desarrollo Local

Para modificar código o desarrollar:

```bash
# Clonar repositorio
git clone https://github.com/Beon-World-Wide/laravel-scaffolding-2026.git
cd laravel-scaffolding-2026

# Setup automático
./docker-setup.sh
```

✅ **Ventajas**: Código editable, hot reload, desarrollo completo

### 3️⃣ Demo Rápido

Solo para ver la aplicación (sin BD):

```bash
docker run -p 8001:9000 -e APP_KEY=base64:Rq/Rr/mDA1w4vXOpjPOAp3U1vyBZXJpVcjRbcMiDWKE= imorlab/laravel-scaffolding:latest
```

⚠️ **Limitaciones**: Solo páginas estáticas, sin base de datos

## 🌐 Acceso

Después del setup:

- **🌍 Aplicación**: http://localhost:8001
- **🔧 phpMyAdmin**: http://localhost:8080
  - Usuario: `laravel_user`
  - Contraseña: `user_password`

### 👤 Usuarios de Prueba

```
📧 admin@admin.com / 🔐 password (Admin)
📧 user@user.com / 🔐 password (Usuario)
```

## 🛠️ Comandos Útiles

> 📝 **Todos los comandos de esta sección se ejecutan en tu terminal**. Copia y pega cada línea por separado.

### Básicos

```bash
# Iniciar
docker compose up -d

# Detener
docker compose down

# Ver estado
docker compose ps

# Ver logs
docker compose logs -f app
```

### Laravel

```bash
# Comandos Artisan
docker compose exec app php artisan migrate
docker compose exec app php artisan tinker

# Dependencias
docker compose exec app composer install
docker compose exec app npm install

# Cache
docker compose exec app php artisan cache:clear
```

### Base de Datos

```bash
# Conectar
docker compose exec db mysql -u laravel_user -p

# Backup
docker compose exec db mysqldump -u laravel_user -puser_password laravel_scaffolding > backup.sql
```

## 🚨 Problemas Comunes

### Sin Estilos CSS

```bash
docker compose exec app npm run build
docker compose exec app php artisan cache:clear
docker compose restart webserver
```

### Puerto Ocupado

```bash
# Ver qué usa el puerto
netstat -tulpn | grep :8001

# Cambiar puerto en docker-compose.yml
# "8001:80" → "8002:80"
```

### Error Base de Datos

```bash
# Verificar MySQL
docker compose ps
docker compose logs db

# Reiniciar
docker compose restart db
```

### Resetear Todo

```bash
docker compose down
docker system prune -a --volumes
./docker-hub-setup.sh
```

## 📁 Archivos Docker

```
proyecto/
├── 🐳 Dockerfile
├── 🔧 docker-compose.yml
├── 🏷️ docker-compose.hub.yml
├── 📋 docker-setup.sh
├── 📋 docker-hub-setup.sh
├── 🧹 docker-cleanup.sh
└── 📂 docker-compose/nginx/default.conf
```

## 🎯 Enlaces Útiles

- **📦 Docker Hub**: [imorlab/laravel-scaffolding](https://hub.docker.com/r/imorlab/laravel-scaffolding)
- **🐙 GitHub**: [laravel-scaffolding-2026](https://github.com/Beon-World-Wide/laravel-scaffolding-2026)

## 💡 Tips

1. **Debugging**: Usa `docker compose logs -f`
2. **Backups**: Hazlos regulares de la BD
3. **Producción**: Revisa variables de entorno de seguridad
4. **Volúmenes**: Los datos persisten entre reinicios

---

**¿Problemas?** Crea un issue en GitHub.
