# PHP Sandbox (Docker)

## Стек

-   PHP 8.5 FPM
-   Nginx 1.29
-   MySQL 8.4
-   Redis 8
-   Xdebug
-   Composer 2

## Конфигурация через `.env`

Все параметры задаются в `.env`. При первом запуске файл копируется из
`.env.example`.

Пример:

``` dotenv
APP_ENV=local
APP_DEBUG=1
APP_PORT=8081
APP_URL=http://localhost:8081

MYSQL_PORT=3307
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=phpsandbox
MYSQL_USER=phpsandbox
MYSQL_PASSWORD=phpsandbox

REDIS_PORT=6380

XDEBUG_CLIENT_HOST=host.docker.internal
XDEBUG_CLIENT_PORT=9003
XDEBUG_MODE=debug

UID=1000
GID=1000
```

## Первый запуск

``` bash
make install
```

Открыть: http://localhost:8081

Если есть composer:

``` bash
make composer-install
```

## Порты

Сервис        Порт
  ------------- ------
App (nginx)   8081
MySQL         3307
Redis         6380
Xdebug        9003

## MySQL

С хоста: - host: 127.0.0.1 - port: \${MYSQL_PORT} - db/user/pass --- из
`.env`

Внутри контейнеров: - host: mysql - port: 3306

## Redis

С хоста: - host: 127.0.0.1 - port: \${REDIS_PORT}

Внутри контейнеров: - host: redis - port: 6379

## Make

-   make install
-   make up / down / rebuild
-   make logs s=php
-   make shell
-   make shell-redis
-   make shell-mysql
-   make composer-install
-   make composer-update
-   make status

## Xdebug

Режим: trigger

PhpStorm: - port: 9003 - host: localhost - port: 8081 - path: project →
/var/www/html

Включить: Start Listening for PHP Debug Connections

### Debug flow

Ставь breakpoint в `index.php` и проверяй: - \$\_SERVER - \$\_GET /
\$\_POST - getenv()