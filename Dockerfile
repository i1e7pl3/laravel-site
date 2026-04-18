FROM php:8.3-fpm
<<<<<<< HEAD
RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip
=======

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y git unzip libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

>>>>>>> d2046f5 (7 practice)
WORKDIR /var/www