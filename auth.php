<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function adminLogin(string $login, string $password): bool
{
    $expectedLogin = 'admin';
    $expectedPassword = 'admin';

    if ($login === $expectedLogin && $password === $expectedPassword) {
        $_SESSION['is_admin'] = true;
        return true;
    }

    return false;
}

function isAdmin(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return !empty($_SESSION['is_admin']);
}

function logoutAdmin(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        setcookie(session_name(), '', time() - 42000, '/');
    }

    session_destroy();
}
