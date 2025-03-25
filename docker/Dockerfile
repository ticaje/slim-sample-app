FROM php:8.4-apache

# Install required packages
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Apache mod rewrite
RUN a2enmod rewrite

# Xdebug config
COPY ./docker/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Set working dir (optional)
WORKDIR /var/www/html

# Copy your source code (optional here, handled by docker-compose volume)

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
