<?php
require_once 'auth.php';
require_once 'subscription_functions.php';

$isAdmin = isAdmin();
$subscriptions = $isAdmin ? getSubscriptions() : [];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lollypop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="admin-section">
        <div class="container">
            <div class="admin-info">
                <div>
                    <h2>Сторінка адміністратора</h2>
                    <p>Тут відображаються підписки користувачів.</p>
                </div>
                <?php if ($isAdmin): ?>
                    <a href="logout.php" class="btn-manager">Log Out</a>
                <?php endif; ?>
            </div>

            <?php if ($isAdmin): ?>
                <?php if (empty($subscriptions)): ?>
                    <p class="admin-empty">Підписок ще немає.</p>
                <?php else: ?>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email підписника</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subscriptions as $index => $email): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php else: ?>
                <div class="admin-block">
                    <p>Доступ до цієї сторінки обмежений. Будь ласка, увійдіть як адміністратор.</p>
                    <a href="login.php" class="btn-manager">Увійти</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
