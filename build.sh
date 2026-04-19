#!/bin/bash
set -e

cd /var/www
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache