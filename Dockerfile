FROM php:8.3-fpm
RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip
WORKDIR /var/www