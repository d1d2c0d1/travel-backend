FROM php:8.0-fpm-alpine as backend-stage

LABEL maintainer="Travel"

RUN docker-php-ext-install pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-3.0.4 \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html/backend

COPY . .

RUN echo "List directory!"
RUN ls
RUN composer install
RUN composer update
RUN composer dump-autoload
RUN chmod 777 -R storage

RUN chown -R www-data:www-data *
