FROM php:8.2-fpm-alpine

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/app

# Copy application files
COPY . .

# Copy composer.json and composer.lock files
COPY composer.json composer.lock ./

# Install application dependencies
RUN composer install

# Expose port 80
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]
