document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form');
    const loginButton = document.getElementById('login-button');
    const messageDiv = document.getElementById('login-message');

    loginForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        loginButton.disabled = true;
        loginButton.textContent = 'Зачекайте...';
        messageDiv.textContent = '';

        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        try {
            const response = await fetch('login_process.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username, password })
            });

            const result = await response.json();

            if (result.success) {
                window.location.href = 'admin.php';
            } else {
                messageDiv.textContent = result.message || 'Невірний логін або пароль.';
                messageDiv.style.color = '#A52A2A';
                loginButton.disabled = false;
                loginButton.textContent = 'Увійти';
            }
        } catch (error) {
            messageDiv.textContent = 'Помилка серверу. Спробуйте пізніше.';
            messageDiv.style.color = '#A52A2A';
            loginButton.disabled = false;
            loginButton.textContent = 'Увійти';
            console.error(error);
        }
    });
});
