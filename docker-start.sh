#!/bin/sh
set -e
php artisan config:clear
php artisan migrate --force
if [ "$RUN_SEED" = "true" ]; then
  php artisan db:seed --force
  php artisan db:seed --class=AdminSeeder --force
fi
php artisan config:cache
php artisan route:cache || true
exec apache2-foreground