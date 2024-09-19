<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS файла для стилей страницы -->
    <link rel="stylesheet" href="./assets/css и scss/style-9.2.css">
    <!-- Подключение JavaScript файла для функциональности -->
    <script src="./js/java.js"></script>
    <title>Заявка</title>
</head>
<body>
    <!-- Раздел авторизации -->
    <section>
        <section class="Avtorizaciia">
            <div class="content">
                <!-- Форма авторизации пользователя -->
                <form method="POST" action="./app/database/login_handler.php" class="Avtorizaciia-text">
                    <h1>Авторизация</h1>
                    <!-- Поле ввода имени пользователя -->
                    <input type="text" name="username" placeholder="Имя" required>
                    <!-- Поле ввода пароля -->
                    <input type="password" name="password" placeholder="Пароль" required><br>
                    <!-- Кнопка отправки формы -->
                    <button type="submit">Войти</button>
                </form>
                <div>
                    <!-- Ссылка для возврата на предыдущую страницу -->
                    <a href="./index.php">Назад</a>
                </div>  
            </div>
        </section>
    </section>
</body>
</html>