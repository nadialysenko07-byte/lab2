<?php
function getSubscriptionFile(): string
{
    return __DIR__ . '/storage/subscriptions.ser';
}

function getLogFile(): string
{
    return __DIR__ . '/log.txt';
}

function ensureStorageDirectory(): void
{
    $dir = dirname(getSubscriptionFile());

    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }
}

function saveSubscription(string $email): bool
{
    ensureStorageDirectory();

    $file = getSubscriptionFile();
    $logEntry = $email . PHP_EOL;

    $result = file_put_contents($file, $logEntry, FILE_APPEND | LOCK_EX);

    if ($result !== false) {
        logSubscription($email);
        return true;
    }

    return false;
}

function getSubscriptions(): array
{
    $file = getSubscriptionFile();

    if (!file_exists($file)) {
        return [];
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    return array_map('trim', $lines ?: []);
}

function logSubscription(string $email): void
{
    $logFile = getLogFile();
    $currentTime = date('Y-m-d H:i:s');
    $logLine = sprintf("[%s] Нова підписка додана для email: %s%s", $currentTime, $email, PHP_EOL);
    file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX);
}
