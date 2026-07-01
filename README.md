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

`public/build` хранится в git. Это готовые Vite-ассеты для прода: перед релизным коммитом frontend нужно собрать локально и добавить результат в коммит.

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

Node.js/npm на проде для обычного деплоя не нужен: frontend-ассеты собираются локально и приезжают в `public/build` из git.

## Первый git-деплой

Перед первым деплоем нужный коммит должен быть запушен в GitHub.

Если в продовой папке уже настроен `.git`, но еще нет checkout-коммита, первый запуск должен быть явным:

```bash
cd /home/c/co81879/kit
FIRST_GIT_DEPLOY=1 ./deploy.sh <commit-hash-or-tag>
```

Если `deploy.sh` еще физически не лежит на проде, его нужно один раз загрузить по SFTP вместе с `db-backup.sh`, либо выполнить первый checkout вручную через git. После первого checkout оба скрипта будут приезжать из git.

## Обычный деплой кода

Если менялись frontend-исходники или зависимости, перед коммитом собрать ассеты локально:

```bash
npm ci
npm run build
git add public/build package.json package-lock.json resources/js vite.config.js
git commit
```

Если frontend не менялся, пересобирать `public/build` не нужно.

```bash
cd /home/c/co81879/kit
./deploy.sh <commit-hash-or-tag>
```

Скрипт делает:

- `git fetch`;
- `git reset --hard <commit>`;
- пропускает Composer, если `composer.lock` не менялся и `vendor` уже установлен;
- проверяет, что Vite-ассеты уже есть в `public/build`;
- `php artisan storage:link`, если ссылки нет;
- очистку и прогрев Laravel-кэша.

Миграции по умолчанию не запускаются.

Если изменился `composer.lock`, скрипт остановится до `reset`. После проверки Composer 2.2+ запускать:

```bash
RUN_COMPOSER=1 ./deploy.sh <commit-hash-or-tag>
```

## Закрытое превью нового ЖК

Чтобы подготовить новую страницу ЖК на проде и не открыть ее посетителям раньше времени:

1. В админке создать или заполнить ЖК и оставить поле `Активность` выключенным.
2. Контент-менеджер или администратор входит в `/admin`.
3. После входа открыть прямой URL страницы, например `/complex/detail/5`.

Неактивный ЖК не попадает на главную и в список ЖК. По прямому URL публичный посетитель получает `404`, а залогиненный пользователь админки видит страницу для проверки контента.

Контент из админки, загруженные фото и записи хода строительства не приезжают с git-деплоем. Для прода их нужно создать в продовой админке или переносить отдельно через дамп/ручной импорт.

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

Бэкап БД не входит в обычный деплой намеренно: код можно выкатывать часто, а БД нужно бэкапить только перед миграциями, ручными SQL-правками или рискованной работой с данными.

После создания бэкапа полезно проверить, что файл не пустой и дамп завершен:

```bash
test -s /home/c/co81879/backups/kit-db/kit_db_YYYYMMDD_HHMMSS.sql
tail -n 1 /home/c/co81879/backups/kit-db/kit_db_YYYYMMDD_HHMMSS.sql
```

## Откат

Откат кода:

```bash
cd /home/c/co81879/kit
./deploy.sh <previous-commit-hash>
```

Если откатывались миграции или данные, сначала проверить бэкап БД и только потом выполнять ручной SQL-откат или `php artisan migrate:rollback`.

## Что можно чистить на проде

Бэкапы БД лежат здесь:

```bash
/home/c/co81879/backups/kit-db
```

Старые точечные архивы перед git-деплоем лежат здесь:

```bash
/home/c/co81879/git-deploy-backups
```

Что можно чистить вручную после проверки, что свежие бэкапы есть:

- старые SQL-бэкапы в `/home/c/co81879/backups/kit-db`;
- старые архивы в `/home/c/co81879/git-deploy-backups`;
- старые Laravel-логи в `/home/c/co81879/kit/storage/logs`, если они не нужны для диагностики.

Пример посмотреть размер:

```bash
du -sh /home/c/co81879/backups/kit-db /home/c/co81879/git-deploy-backups /home/c/co81879/kit/storage/logs
```

Пример удалить SQL-бэкапы старше 30 дней:

```bash
find /home/c/co81879/backups/kit-db -type f -name 'kit_db_*.sql' -mtime +30 -print
find /home/c/co81879/backups/kit-db -type f -name 'kit_db_*.sql' -mtime +30 -delete
```

Нельзя чистить без отдельной проверки:

- `.env`;
- `vendor`;
- `storage/app` и загруженные через админку файлы;
- `public/storage`;
- текущую рабочую папку `/home/c/co81879/kit`;
- untracked-файлы на проде через `git clean -fdx`.
