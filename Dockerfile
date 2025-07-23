FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libpq-dev libssl-dev nginx supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Copy nginx config
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# Supervisor config
COPY ./supervisord.conf /etc/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
