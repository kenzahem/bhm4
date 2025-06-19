# Use official PHP image with FPM
FROM serversideup/php:8.4-fpm-alpine

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy only composer files first to optimize Docker layer caching
COPY composer.json composer.lock ./

# Install dependencies (without scripts to avoid missing class errors)
RUN composer install --no-interaction --no-scripts --no-autoloader --no-dev

# Copy the rest of the application files
COPY . .

# Finish composer installation
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Permissions
RUN chown -R www-data:www-data /var/www/storage
RUN chmod -R 775 /var/www/storage

RUN rm -rf /app/cache
