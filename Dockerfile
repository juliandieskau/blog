# Dockerfile
FROM php:8.3-apache

# Install mysqli and other common PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite
