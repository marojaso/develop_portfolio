#!/bin/bash
set -e

# Install composer if not available
if ! command -v composer &> /dev/null; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

composer install --optimize-autoloader --no-dev

php artisan migrate --force

npm install
npm run build