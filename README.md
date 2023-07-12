# Как поднять проект

1) sudo chmod +x ./up.sh
2) sudo ./up.sh

## Команды отдельно

1) docker compose exec php-fpm composer install
2) docker compose exec php-fpm composer run-script post-root-package-install
3) docker compose exec php-fpm composer run-script post-create-project-cmd
4) docker compose exec php-fpm php artisan migrate
5) docker compose exec php-fpm npm install
6) docker compose exec php-fpm npm run build
7) docker compose exec php-fpm php artisan db:seed
8) docker compose exec php-fpm php artisan app:init-access-role