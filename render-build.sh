#!/usr/bin/env bash
# exit on error
set -o errexit

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Optimizing Laravel..."
php artisan optimize

echo "Running migrations..."
# Gunakan --force agar jalan otomatis di server
php artisan migrate --force