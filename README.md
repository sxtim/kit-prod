# ЖК «Спутник»

Laravel-проект сайта ООО предприятие «ИП К.И.Т.» с админкой Orchid.

## Локальный запуск

1. Склонировать репозиторий.
2. Скопировать актуальный `.env` с сервера и заменить `DB_*` под локальную БД.
3. Установить зависимости:
   ```bash
   composer install
   npm install
   ```
4. Импортировать дамп MySQL или выполнить миграции:
   ```bash
   php artisan migrate --seed
   ```
5. Если ключа приложения нет:
   ```bash
   php artisan key:generate
   ```
6. Проверить ссылку на storage:
   ```bash
   php artisan storage:link
   ```
7. Запустить проект:
   ```bash
   npm run dev
   php artisan serve --host=127.0.0.1 --port=8000
   ```

## Что не хранится в git

- `.env` и локальные `.env.*`;
- `vendor/`, `node_modules/`;
- `public/storage`;
- `storage` runtime-файлы, кроме `.gitignore`;
- SQL-дампы, логи, generated feeds;
- загруженные через админку файлы.

`public/vendor/orchid` хранится в git, поэтому ассеты Orchid дополнительно публиковать на проде обычно не нужно.

## Прод

Рабочая папка продакшена:

```bash
/home/c/co81879/kit
```

`public_html` смотрит на:

```bash
/home/c/co81879/kit/public
```

Git remote для продового деплоя:

```bash
https://github.com/sxtim/kit-prod.git
```

## Первый git-деплой

Перед первым деплоем нужный коммит должен быть запушен в GitHub.

Если в продовой папке уже настроен `.git`, но еще нет checkout-коммита, первый запуск должен быть явным:

```bash
cd /home/c/co81879/kit
FIRST_GIT_DEPLOY=1 ./deploy.sh <commit-hash-or-tag>
```

Если `deploy.sh` еще физически не лежит на проде, его нужно один раз загрузить по SFTP вместе с `db-backup.sh`, либо выполнить первый checkout вручную через git. После первого checkout оба скрипта будут приезжать из git.

## Обычный деплой кода

```bash
cd /home/c/co81879/kit
./deploy.sh <commit-hash-or-tag>
```

Скрипт делает:

- `git fetch`;
- `git reset --hard <commit>`;
- `composer install --no-dev --optimize-autoloader`;
- `php artisan storage:link`, если ссылки нет;
- очистку и прогрев Laravel-кэша.

Миграции по умолчанию не запускаются.

## Деплой с миграциями

Если в деплое есть миграции БД:

```bash
cd /home/c/co81879/kit
./db-backup.sh
RUN_MIGRATIONS=1 ./deploy.sh <commit-hash-or-tag>
```

Бэкап БД сохраняется в:

```bash
$HOME/backups/kit-db
```

Путь можно переопределить:

```bash
BACKUP_DIR=/home/c/co81879/backups/kit-db ./db-backup.sh
```

## Откат

Откат кода:

```bash
cd /home/c/co81879/kit
./deploy.sh <previous-commit-hash>
```

Если откатывались миграции или данные, сначала проверить бэкап БД и только потом выполнять ручной SQL-откат или `php artisan migrate:rollback`.
