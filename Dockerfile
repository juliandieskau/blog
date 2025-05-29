# Dockerfile
FROM php:8.3-apache

# Install mysqli and other common PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite
