# syntax=docker/dockerfile:1

FROM php:8.2-fpm-alpine

LABEL description="Young Voices of Hope — Marsabit (Laravel 12)"

# ---- System dependencies + PHP extensions ----
RUN apk add --no-cache \
        nginx \
        supervisor \
        bash \
        curl \
        gettext \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libzip-dev \
        zip \
        unzip \
        postgresql-dev \
        oniguruma-dev \
        icu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo \
        pdo_pgsql \
        pgsql \
        mbstring \
        bcmath \
        gd \
        zip \
        intl \
        exif \
        pcntl

# ---- Composer ----
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP dependencies first (better layer caching)
COPY composer.json composer.lock* ./
RUN composer install \
        --no-dev \
        --no-interaction \
        --no-scripts \
        --no-progress \
        --prefer-dist \
        --optimize-autoloader

# Now copy the rest of the application
COPY . .

RUN composer dump-autoload --optimize --no-dev

# Writable directories Laravel needs at runtime
RUN mkdir -p \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/testing \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# nginx + supervisor configuration
COPY docker/nginx.conf.template /etc/nginx/templates/default.conf.template
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Render sets $PORT at runtime; this is just a sensible local default
EXPOSE 10000

ENTRYPOINT ["/entrypoint.sh"]
