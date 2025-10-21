FROM php:8.4-fpm

# Installa le dipendenze di sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    libicu-dev

# Pulisce la cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installa le estensioni PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

RUN pecl install --onlyreqdeps --force redis \
  && rm -rf /tmp/pear \
  && docker-php-ext-enable redis

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea l'utente laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copia la configurazione di nginx per Laravel
COPY nginx/default.conf /etc/nginx/sites-available/default

# Copia la configurazione di supervisor
COPY supervisor/laravel.conf /etc/supervisor/conf.d/laravel.conf

# Imposta la directory di lavoro
WORKDIR /var/www/html


# Espone la porta 80 per Nginx
EXPOSE 80

# Avvia supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
