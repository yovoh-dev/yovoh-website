#!/bin/bash
set -e

# Render assigns a dynamic $PORT; default to 10000 for local `docker run`.
: "${PORT:=10000}"
export PORT

mkdir -p /etc/nginx/http.d
# Only substitute ${PORT} — leave nginx's own $uri, $document_root, etc. untouched.
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/http.d/default.conf

cd /var/www/html

# Cache config/routes/views for a faster boot. Safe to run every start since
# these are rebuilt from the current environment each time.
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Apply any pending schema migrations. This does NOT seed data, so admin
# edits to Pillars/Budget/Stakeholders/etc. are never overwritten on deploy.
php artisan migrate --force

exec supervisord -c /etc/supervisord.conf
