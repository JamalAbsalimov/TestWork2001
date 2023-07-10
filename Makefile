build:
	docker compose build --no-cache
	docker compose up -d

up:
	docker compose up -d

in:
	docker compose exec php-fpm bash

down:
	docker compose down

TABLE_NAME ?= $(shell bash -c 'read -p "Название таблицы: " tablename; echo tablename')
table:
	docker compose exec php-fpm php artisan make:migration $(TABLE_NAME)

migrate:
	docker compose exec php-fpm php artisan migrate

migrate-roll:
	docker compose exec php-fpm php artisan migrate:rollback

exec:
	docker compose exec php-fpm