#!/usr/bin/env bash
set -euo pipefail

APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
TARGET="${1:-${DEPLOY_REF:-}}"

cd "$APP_DIR"

if [ -z "$TARGET" ]; then
    echo "Usage: ./deploy.sh <commit-hash-or-tag>"
    echo "Example: ./deploy.sh 2ff2fd0"
    exit 1
fi

if [ ! -d .git ]; then
    echo "Deploy stopped: $APP_DIR is not a git repository."
    echo "Set up git deploy on the server first, then run this script again."
    exit 1
fi

HAS_HEAD=0
if git rev-parse --verify HEAD >/dev/null 2>&1; then
    HAS_HEAD=1
fi

if [ "$HAS_HEAD" = "1" ]; then
    if ! git diff --quiet || ! git diff --cached --quiet; then
        echo "Deploy stopped: working tree has local changes."
        git status --short
        exit 1
    fi
elif [ "${FIRST_GIT_DEPLOY:-0}" != "1" ]; then
    echo "Deploy stopped: this repository has no checked out commit yet."
    echo "Run the first deploy explicitly: FIRST_GIT_DEPLOY=1 ./deploy.sh <commit-hash-or-tag>"
    exit 1
fi

PREVIOUS_COMMIT="$(git rev-parse --short HEAD 2>/dev/null || true)"

echo "Fetch git refs"
git fetch --all --tags --prune

COMMIT="$(git rev-parse --verify "$TARGET^{commit}")"
echo "Deploy commit: $COMMIT"
if [ -n "$PREVIOUS_COMMIT" ]; then
    echo "Previous commit: $PREVIOUS_COMMIT"
fi

CURRENT_LOCK_HASH=""
if [ -f composer.lock ]; then
    CURRENT_LOCK_HASH="$(sha256sum composer.lock | awk '{print $1}')"
fi
TARGET_LOCK_HASH="$(git show "$COMMIT:composer.lock" | sha256sum | awk '{print $1}')"

INSTALL_DEPENDENCIES=0
if [ ! -f vendor/autoload.php ] || [ "$CURRENT_LOCK_HASH" != "$TARGET_LOCK_HASH" ]; then
    if [ "${RUN_COMPOSER:-0}" != "1" ]; then
        echo "Deploy stopped before reset: Composer dependencies differ or vendor is missing."
        echo "Verify Composer >= 2.2, then run with RUN_COMPOSER=1."
        exit 1
    fi

    INSTALL_DEPENDENCIES=1
fi

git reset --hard "$COMMIT"

if [ "$INSTALL_DEPENDENCIES" = "1" ]; then
    echo "Install PHP dependencies"
    composer install --no-dev --optimize-autoloader --no-interaction
else
    echo "Skip Composer: composer.lock is unchanged and vendor is present"
fi

if [ ! -L public/storage ]; then
    echo "Create storage symlink"
    php artisan storage:link
fi

if [ "${RUN_MIGRATIONS:-0}" = "1" ]; then
    echo "Run migrations"
    php artisan migrate --force
else
    echo "Skip migrations. Run with RUN_MIGRATIONS=1 when the deploy includes DB migrations."
fi

echo "Clear and warm Laravel cache"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Deploy completed"
