#!/usr/bin/env bash
set -euo pipefail

APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
BACKUP_DIR="${BACKUP_DIR:-$HOME/backups/kit-db}"
export BACKUP_DIR

cd "$APP_DIR"

if [ ! -f .env ]; then
    echo "Backup stopped: .env not found."
    exit 1
fi

if ! command -v mysqldump >/dev/null 2>&1; then
    echo "Backup stopped: mysqldump not found."
    exit 1
fi

mkdir -p "$BACKUP_DIR"

php -r '
    require "vendor/autoload.php";
    $app = require "bootstrap/app.php";
    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

    $connectionName = config("database.default");
    $database = config("database.connections.{$connectionName}");

    if (($database["driver"] ?? null) !== "mysql") {
        fwrite(STDERR, "Backup stopped: only MySQL connections are supported.\n");
        exit(1);
    }

    foreach (["username", "password", "database"] as $key) {
        if (! isset($database[$key])) {
            fwrite(STDERR, "Backup stopped: database {$key} is not configured.\n");
            exit(1);
        }
    }

    $defaults = tempnam(sys_get_temp_dir(), "mysqldump_");
    register_shutdown_function(static fn () => is_file($defaults) && unlink($defaults));

    $backupDir = getenv("BACKUP_DIR");
    $backupFile = rtrim($backupDir, "/") . "/kit_db_" . date("Ymd_His") . ".sql";

    file_put_contents($defaults, "[client]\n"
        . "user=\"{$database["username"]}\"\n"
        . "password=\"{$database["password"]}\"\n"
        . "host=\"" . ($database["host"] ?? "localhost") . "\"\n"
        . (! empty($database["port"]) ? "port=\"{$database["port"]}\"\n" : "")
        . (! empty($database["unix_socket"]) ? "socket=\"{$database["unix_socket"]}\"\n" : ""));
    chmod($defaults, 0600);

    $cmd = "mysqldump"
        . " --defaults-extra-file=" . escapeshellarg($defaults)
        . " --single-transaction --quick --skip-lock-tables --no-tablespaces"
        . " " . escapeshellarg($database["database"])
        . " > " . escapeshellarg($backupFile);

    passthru($cmd, $code);

    if ($code !== 0) {
        @unlink($backupFile);
        exit($code);
    }

    echo $backupFile . PHP_EOL;
'
