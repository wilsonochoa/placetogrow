# Usar una imagen base de PHP
FROM php:8.2-fpm

# Instalar dependencias y extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    libssl-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql mysqli zip opcache

#COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install && php artisan key:generate

#NODE
#RUN apt-get update && apt-get install -y nodejs npm && npm i && npm run build

# Copiar el archivo de configuración personalizado de PHP (opcional)
#COPY ./php.ini /usr/local/etc/php/

# Establecer el directorio de trabajo


# Copiar el contenido del directorio actual al contenedor
#COPY . .

# Exponer el puerto 9000 para php-fpm
#EXPOSE 9000

# Comando por defecto para ejecutar php-fpm
#CMD ["php-fpm"]
