FROM php:8.0.10-fpm-alpine as backend-stage

LABEL maintainer="travel"

# Install services
RUN apt-get update \
        && apt-get install -y \
            g++ \
            git \
            curl \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            libpng-dev \
            libonig-dev \
            libxml2-dev \
            zip \
            zlib1g-dev \
            unzip 

# Install php extensions
RUN docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_mysql \
            sockets \
            mbstring \
            exif \
            pcntl \
            bcmath \
            gd

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install debuger
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-3.0.4 \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html/backend

# Copy project files in work directory
COPY . .

# Update project
RUN composer install
RUN composer update
RUN composer dump-autoload

RUN chmod 777 -R storage
