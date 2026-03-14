FROM php:8.3-fpm-alpine3.19

RUN apk add --no-cache \
    bash curl libpng-dev libzip-dev zlib-dev mysql-client nodejs npm

RUN docker-php-ext-install gd zip pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

EXPOSE 9000

CMD sh -c "cp -n .env.example .env && \
    composer install --no-interaction && \
    php artisan key:generate --ansi && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache && \
    npm install && \
    npm run build && \
    (php artisan migrate:fresh --seed --force || true) && \
    php-fpm"