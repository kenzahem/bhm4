FROM serversideup/php:8.3-fpm-nginx

# Environment configuration
ENV PHP_OPCACHE_ENABLE=1 \
    NODE_ENV=production \
    COMPOSER_NO_INTERACTION=1

# Install system dependencies as root
USER root

# Install Node.js (optimized single layer)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Create and set proper permissions for web root
RUN mkdir -p /var/www/html && \
    chown -R www-data:www-data /var/www/html

# Copy application files (with proper permissions)
COPY --chown=www-data:www-data . /var/www/html

# Switch to application user
USER www-data

# Set working directory
WORKDIR /var/www/html

# Install and build frontend assets (optimized layer)
RUN npm ci --no-audit --prefer-offline && \
    npm run build && \
    rm -rf ~/.npm /tmp/*

# Install PHP dependencies (optimized layer)
RUN composer install --no-dev --optimize-autoloader --no-interaction && \
    composer clear-cache

# Optional: Cleanup unnecessary files
RUN rm -rf /var/www/html/node_modules && \
    rm -rf /var/www/html/tests
