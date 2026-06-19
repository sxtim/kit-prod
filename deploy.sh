#!/usr/bin/env bash
set -euo pipefail

APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
BRANCH="${DEPLOY_BRANCH:-$(git -C "$APP_DIR" branch --show-current 2>/dev/null || true)}"
BRANCH="${BRANCH:-main}"

cd "$APP_DIR"

if [ ! -d .git ]; then
    echo "Deploy stopped: $APP_DIR is not a git repository."
    echo "Set up git deploy on the server first, then run this script again."
    exit 1
fi

if ! git diff --quiet || ! git diff --cached --quiet; then
    echo "Deploy stopped: working tree has local changes."
    git status --short
    exit 1
fi

echo "Deploy branch: $BRANCH"
git fetch origin "$BRANCH"
git checkout "$BRANCH"
git pull --ff-only origin "$BRANCH"

echo "Install PHP dependencies"
composer install --no-dev --optimize-autoloader --no-interaction

if [ ! -L public/storage ]; then
    echo "Create storage symlink"
    php artisan storage:link
fi

if [ "${SKIP_DB_BACKUP:-0}" != "1" ]; then
    if ! command -v mysqldump >/dev/null 2>&1; then
        echo "Deploy stopped: mysqldump not found. Make a DB backup manually or run with SKIP_DB_BACKUP=1."
        exit 1
    fi

    echo "Backup database"
    mkdir -p storage/app/db-backups
    php -r '
        $env = parse_ini_file(".env");
        $file = "storage/app/db-backups/before_deploy_" . date("Ymd_His") . ".sql";
        $cmd = "mysqldump"
            . " -h" . escapeshellarg($env["DB_HOST"] ?? "localhost")
            . " -u" . escapeshellarg($env["DB_USERNAME"])
            . " -p" . escapeshellarg($env["DB_PASSWORD"])
            . " " . escapeshellarg($env["DB_DATABASE"])
            . " > " . escapeshellarg($file);
        passthru($cmd, $code);
        exit($code);
    '
fi

echo "Run migrations"
php artisan migrate --force

echo "Clear and warm Laravel cache"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Deploy completed"
