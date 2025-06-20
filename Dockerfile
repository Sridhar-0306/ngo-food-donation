FROM php:8.2-apache

# Install MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Copy app files into Apache web root
COPY public/ /var/www/html/
FROM php:8.2-apache
COPY public/ /var/www/html/
