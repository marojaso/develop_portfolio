FROM php:8.1-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql pdo mbstring exif pcntl bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application
COPY . /var/www/

# Set permissions
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Install dependencies
RUN cd /var/www && composer install --optimize-autoloader --no-dev

# Configure Apache
RUN echo "<Directory /var/www/>" > /etc/apache2/sites-available/000-default.conf && \
    echo "    Options Indexes FollowSymLinks" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    Require all granted" >> /etc/apache2/sites-available/000-default.conf && \
    echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www