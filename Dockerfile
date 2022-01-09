FROM php:8.0-fpm-bullseye as backend-stage

LABEL maintainer="Travel"

# Install services
RUN apt update \
        && apt install -y \
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
            unzip \
            sudo

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
RUN apt clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/backend

# Copy project files in work directory
COPY . .

RUN addgroup --system travel --gid 1000 --shell /bin/bash
RUN adduser --system travel --uid 1000 --shell /bin/bash

RUN echo "travel ALL=(ALL) NOPASSWD:ALL" | tee /etc/sudoers.d/travel

RUN chmod 777 -R storage
RUN chown -R travel:travel /var/www/html/backend

USER travel

# Update project
RUN composer install
RUN composer update
RUN composer dump-autoload

RUN php artisan migrate

RUN sudo chown -R travel:travel /var/www/html/backend/vendor
