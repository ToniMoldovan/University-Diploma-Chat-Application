FROM php:7.4-fpm

# Install necessary PHP extensions and dependencies
RUN docker-php-ext-install pdo_mysql

# Install system dependencies for Composer and Git
RUN apt-get update && \
    apt-get install -y git unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change the working directory
WORKDIR /var/www/html

# Set the COMPOSER_ALLOW_SUPERUSER environment variable to 1
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install Ratchet WebSockets
RUN composer require cboden/ratchet
