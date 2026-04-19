#!/bin/bash
set -e

composer install --optimize-autoloader --no-dev

php artisan migrate --force

npm install
npm run build