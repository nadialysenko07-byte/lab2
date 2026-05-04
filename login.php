<?php
require_once 'auth.php';

if (isAdmin()) {
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lollypop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="login-section">
        <div class="container auth-form">
            <h2>Авторизація адміністратора</h2>
            <p>Введіть логін і пароль, щоб перейти до панелі адміністратора.</p>
            <form id="login-form">
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Логін" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Пароль" required>
                </div>
                <button type="submit" id="login-button" class="btn-subscribe">Увійти</button>
                <div id="login-message" class="form-message"></div>
            </form>
        </div>
    </section>

    <script src="login.js"></script>
</body>
</html>
