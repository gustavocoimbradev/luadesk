FROM php:8.3-fpm-alpine3.19

RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    mysql-client

RUN docker-php-ext-install gd zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache nodejs npm

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

EXPOSE 9000

CMD sh -c "composer install --no-interaction && composer run setup --no-interaction && php-fpm"