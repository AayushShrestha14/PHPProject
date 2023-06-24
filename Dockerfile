# Use the official PHP 8.2.0 image as the base
FROM php:8.2.0-fpm-alpine

# Set the working directory inside the container
WORKDIR /app

# Copy the application files to the container
COPY . /app

# Install dependencies
RUN apk add --no-cache \
    # Add any necessary packages here, e.g., curl, zip, gd, etc.
    && docker-php-ext-install <extension1> <extension2> ...

# Expose port 80 for web server
EXPOSE 80

# Start the PHP-FPM server
CMD ["php-fpm"]
