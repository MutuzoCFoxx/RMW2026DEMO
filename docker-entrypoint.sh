#!/bin/sh
set -e

if [ -z "$APP_KEY" ]; then
    export APP_KEY="$(php artisan key:generate --show)"
fi

php artisan migrate --force
php artisan db:seed --force

PORT="${PORT:-8080}"
exec php artisan serve --host=0.0.0.0 --port="$PORT"
