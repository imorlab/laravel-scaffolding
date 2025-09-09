# Usamos PHP 8.2 con FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Establecemos el directorio de trabajo
WORKDIR /var/www

# Instalamos dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nodejs \
    npm

# Limpiamos la cache de apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalamos extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalamos Composer (gestor de dependencias de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Creamos usuario para la aplicación Laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiamos los archivos del proyecto
COPY . /var/www

# Copiamos composer.json y composer.lock para aprovechar la cache de Docker
COPY composer.json composer.lock /var/www/

# Instalamos dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Copiamos package.json para instalar dependencias de Node.js
COPY package.json /var/www/

# Instalamos dependencias de Node.js
RUN npm install

# Compilamos los assets
RUN npm run build

# Cambiamos el propietario de nuestro directorio de aplicación
RUN chown -R www:www /var/www

# Cambiamos al usuario www
USER www

# Exponemos el puerto 9000 y ejecutamos php-fpm
EXPOSE 9000
CMD ["php-fpm"]
