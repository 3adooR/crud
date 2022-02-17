echo -en "\033[33;1mStart CRUD033[0m\n";
# Composer
composer install
# Backend
php artisan view:clear
php artisan config:clear
php artisan cache:clear
php artisan route:cache
php artisan migrate
php artisan db:seed
php artisan test
# APP commands
php artisan cache-clients
# Run queue listener
php artisan horizon
