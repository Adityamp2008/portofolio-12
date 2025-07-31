FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring tokenizer xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all project files
COPY . .

# Install PHP dependencies via Composer
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN chmod -R 777 storage bootstrap/cache

# Start Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8080
