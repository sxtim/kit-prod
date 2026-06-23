#!/usr/bin/env bash
set -euo pipefail

APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
BACKUP_DIR="${BACKUP_DIR:-$HOME/backups/kit-db}"

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
    $env = parse_ini_file(".env");
    foreach (["DB_USERNAME", "DB_PASSWORD", "DB_DATABASE"] as $key) {
        if (! array_key_exists($key, $env)) {
            fwrite(STDERR, "Backup stopped: {$key} is missing in .env\n");
            exit(1);
        }
    }

    $host = $env["DB_HOST"] ?? "localhost";
    $port = $env["DB_PORT"] ?? null;
    $defaults = tempnam(sys_get_temp_dir(), "mysqldump_");
    $backupDir = getenv("BACKUP_DIR") ?: getenv("HOME") . "/backups/kit-db";
    $backupFile = rtrim($backupDir, "/") . "/kit_db_" . date("Ymd_His") . ".sql";

    file_put_contents($defaults, "[client]\n"
        . "user=\"{$env["DB_USERNAME"]}\"\n"
        . "password=\"{$env["DB_PASSWORD"]}\"\n"
        . "host=\"{$host}\"\n"
        . ($port ? "port=\"{$port}\"\n" : ""));
    chmod($defaults, 0600);

    $cmd = "mysqldump --defaults-extra-file=" . escapeshellarg($defaults)
        . " " . escapeshellarg($env["DB_DATABASE"])
        . " > " . escapeshellarg($backupFile);

    passthru($cmd, $code);
    unlink($defaults);

    if ($code !== 0) {
        @unlink($backupFile);
        exit($code);
    }

    echo $backupFile . PHP_EOL;
'
