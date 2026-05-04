<?php
require_once 'auth.php';
$authText = isAdmin() ? 'Log Out' : 'Log In';
$authLink = isAdmin() ? 'logout.php' : 'login.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lollypop - Майстерня Крафтової Карамелі</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header">
        <div class="container nav-container">
            <div class="logo">Lollypop</div>
            
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="nav-menu" id="nav-menu">
                <ul>
                    <li><a href="#">Головна</a></li>
                    <li><a href="#products">Продукція</a></li>
                    <li><a href="#master">Про майстра</a></li>
                    <li><a href="#contacts">Контакти</a></li>
                    <li><a href="<?php echo $authLink; ?>"><?php echo $authText; ?></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Майстерня крафтової карамелі «Lollypop»</h1>
            <p>Ми створюємо унікальні круглі карамельки з малюнком всередині за вашим запитом. Смак, який неможливо забути.</p>
            <a href="#" class="btn-manager">Зв'язатися з менеджером</a>
        </div>
    </section>

    <section class="products-container" id="products">
        <div class="container">
            <div class="product-grid">
                <div class="card">
                    <img src="img/brand-candy.jpg" alt="Брендована карамель" class="card-img">
                    <div class="card-content">
                        <h3>Брендована карамель</h3>
                        <p>Цукерки з логотипом вашої компанії або малюнком всередині.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/gift-sets.jpg" alt="Тематичні набори" class="card-img">
                    <div class="card-content">
                        <h3>Тематичні набори</h3>
                        <p>Солодкі подарунки до свят, сформовані персонально для вас.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/classic-style.jpg" alt="Стандартна продукція" class="card-img">
                    <div class="card-content">
                        <h3>Стандартна продукція</h3>
                        <p>Наша класична лінійка карамелі ручної роботи.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="master-section" id="master">
        <div class="container master-grid">
            <div class="master-info">
                <h2>Алхімік Карамелі: John Doe</h2>
                <p>Як і John Doe: The Architect of Dark Tales, ми створюємо історії. Але наші історії народжуються у вогні та цукрі. Мене звати John, і я вірю, що кожна цукерка — це маленька казка, запечатана в кришталеву форму.</p>
                <p>Ми не просто варимо карамель, ми вкладаємо в неї душу, створюючи смаки, які закарбовуються в пам'яті.</p>
            </div>
            <div class="master-image">
                <img src="img/about-process.jpg" alt="Майстер за роботою" class="img-styled">
            </div>
        </div>
    </section>

    <section class="address-section" id="contacts">
        <div class="container">
            <div class="address-box">
                <h3>Завітайте до нашої майстерні</h3>
                <p>Видача замовлень та дегустація відбуваються за адресою:</p>
                <p class="highlight">м. Хмельницький, вул. Проскурівська, 12</p>
                <p class="note">Ми працюємо: Пн-Сб з 10:00 до 19:00</p>
            </div>
        </div>
    </section>

<!-- Секція підписки (перед футером) -->
<section class="subscribe-section">
    <div class="container">
        <div class="subscribe-box">
            <h2>Бажаєте солодких новин?</h2>
            <p>Підпишіться на розсилку, щоб першими дізнаватися про нові смаки та акції!</p>
            <form id="subscribe-form" class="subscribe-form">
                <div class="input-group">
                    <input type="email" id="subscriber-email" name="email" placeholder="Ваш Email*" required>
                    <button type="submit" class="btn-subscribe">Підписатися</button>
                </div>
                <div id="form-message" class="form-message"></div>
            </form>
        </div>
    </div>
</section>

<!-- Оновлений професійний футер -->
<footer class="footer">
    <div class="container footer-grid">
        <div class="footer-info">
            <div class="logo">Lollypop</div>
            <p>Майстерня, де народжується магія крафтової карамелі.</p>
        </div>
        <div class="footer-links">
            <h4>Навігація</h4>
            <ul>
                <li><a href="#">Головна</a></li>
                <li><a href="#products">Продукція</a></li>
                <li><a href="#master">Про майстерню</a></li>
            </ul>
        </div>
        <div class="footer-contacts">
            <h4>Контакти</h4>
            <p>📞 +38 (067) 123-45-67</p>
            <p>📩 info@lollypop.ua</p>
            <p>📸 @lollypop.craft</p>
        </div>
    </div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <p>&copy; 2026 Майстерня «Lollypop». Всі права захищені.</p>
    </div>
</div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('is-active');
        });

        // Закриття меню при кліку на пункт
        document.querySelectorAll('.nav-menu a').forEach(n => n.addEventListener('click', () => {
            navMenu.classList.remove('active');
            hamburger.classList.remove('is-active');
        }));
    </script>

    <script>
        // Обробка форми підписки
        document.getElementById('subscribe-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const emailInput = document.getElementById('subscriber-email');
            const messageDiv = document.getElementById('form-message');
            const email = emailInput.value.trim();

            // Очищуємо попередні повідомлення
            messageDiv.textContent = '';
            emailInput.classList.remove('error');

            // Базова валідація на фронтенді
            if (!email) {
                messageDiv.textContent = 'Будь ласка, введіть email.';
                messageDiv.style.color = '#A52A2A';
                emailInput.classList.add('error');
                return;
            }

            // Відправляємо запит на сервер
            fetch('subscriptions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    messageDiv.textContent = data.message;
                    messageDiv.style.color = '#FFE6A7';
                    emailInput.value = ''; // Очищуємо поле після успіху
                } else {
                    messageDiv.textContent = data.message;
                    messageDiv.style.color = '#A52A2A';
                    emailInput.classList.add('error');
                }
            })
            .catch(error => {
                messageDiv.textContent = 'Помилка з\'єднання з сервером.';
                messageDiv.style.color = '#A52A2A';
                console.error('Error:', error);
            });
        });
    </script>

</body>
</html>