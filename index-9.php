<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS файла для стилей страницы -->
    <link rel="stylesheet" href="./assets/css и scss/style-9.css">
    <title>Заявка</title>
    <!-- Подключение Google reCAPTCHA для защиты формы -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <!-- Раздел регистрации -->
    <section class="Registraciia">
        <div class="content">
            <!-- Форма регистрации пользователя -->
            <form class="Regestraciia-text" method="POST" action="./app/database/registor.php">
                <h1>Регистрация</h1>
                <!-- Поле ввода имени пользователя -->
                <input name="username" type="text" placeholder="Имя" required>
                <!-- Поле ввода номера телефона с предустановленным значением -->
                <input type="text" id="inputPhone" value="+7(___)___--" id="telnum" name="telefon" required>
                <!-- Поле ввода пароля -->
                <input name="password" type="text" placeholder="Пароль" required>
                <!-- Поле для подтверждения пароля -->
                <input name="confirm_password" type="text" placeholder="Павторите пароль" required> <br>
                <!-- Google reCAPTCHA для защиты от спама -->
                <div class="g-recaptcha" data-sitekey="6LetODcqAAAAANxb--umUYo8uK22_r0LoFpnO2zQ"></div>
                <!-- Кнопка отправки формы -->
                <button type="submit" class="openavto">Зарегистрироваться</button>
            </form>
            <div>
                <!-- Ссылка для возврата на предыдущую страницу -->
                <a href="./index.php">Назад</a>
            </div>  
        </div>
    </section> 
    <!-- Подключение JavaScript файла для обработки ввода телефона -->
    <script src="./assets/js/inputPhone.js"></script>
</body>
</html>