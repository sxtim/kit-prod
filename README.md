# ЖК «Спутник» — локальный запуск

1. Клонируйте репозиторий и скопируйте актуальный `.env` с сервера (обновите `DB_*` под локальную БД).
2. Установите зависимости:
   ```bash
   composer install
   npm install
   ```
3. Импортируйте дамп MySQL (или выполните `php artisan migrate --seed`) и при необходимости сгенерируйте ключ `php artisan key:generate`.
4. Опубликуйте ассеты Orchid один раз после установки/обновления:
   ```bash
   php artisan orchid:publish --force
   ```
5. Запустите фронтенд и бэкенд:
   ```bash
   npm run dev
   php artisan serve --host=127.0.0.1 --port=8000
   ```
6. Откройте `http://127.0.0.1:8000` — проект готов к работе.

_Примечание:_ `storage/` и `public/vendor/orchid` уже входят в репозиторий, так что дополнительных ручных копирований файлов не требуется.

## Деплой

- Прод должен быть git-репозиторием в `/home/c/co81879/kit`.
- Обычный запуск:
  ```bash
  cd /home/c/co81879/kit
  ./deploy.sh <commit-hash-or-tag>
  ```
- Пример:
  ```bash
  ./deploy.sh 2ff2fd0
  ```
- Скрипт делает: `git fetch`, `git reset --hard <commit>`, `composer install`, `storage:link`, бэкап БД, `migrate --force`, очистку и прогрев Laravel-кэша.
- `storage/`, `.env`, `vendor/`, `node_modules/`, логи, дампы и загруженные через админку файлы не ведутся git.
- Если бэкап БД сделан вручную:
  ```bash
  SKIP_DB_BACKUP=1 ./deploy.sh <commit-hash-or-tag>
  ```
