FROM php:8.3-fpm

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

WORKDIR /var/www