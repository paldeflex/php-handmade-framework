.PHONY: install up down rebuild restart logs shell shell-redis shell-mysql composer-install composer-update status

install:
	cp -n .env.example .env || true
	docker compose up --build -d
	@echo ""
	@echo "✓ Ready: $$(grep '^APP_URL=' .env | cut -d '=' -f2-)"

up:
	docker compose up -d

down:
	docker compose down

rebuild:
	docker compose down
	docker compose up --build -d

restart:
	docker compose restart $(s)

logs:
	docker compose logs -f $(s)

shell:
	docker compose exec php sh

shell-redis:
	docker compose exec redis redis-cli

shell-mysql:
	docker compose exec mysql mysql -u$$(grep '^MYSQL_USER=' .env | cut -d '=' -f2-) -p$$(grep '^MYSQL_PASSWORD=' .env | cut -d '=' -f2-) $$(grep '^MYSQL_DATABASE=' .env | cut -d '=' -f2-)

composer-install:
	docker compose exec php composer install

composer-update:
	docker compose exec php composer update

status:
	docker compose ps