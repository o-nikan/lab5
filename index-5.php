<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS файла для стилей страницы -->
    <link rel="stylesheet" href="./assets/css и scss/style-5.css">
    <!-- Подключение JavaScript файла для функциональности -->
    <script src="./js/java.js"></script>
    <title>Заявка</title>
</head>
<body>
    <!-- Шапка страницы -->
    <header class="header">
        <div class="contener">
            <div class="header-text">
                <!-- Заголовок страницы и логотип с ссылкой на главную страницу -->
                <h1>Заявка</h1>
                <a href="./index.php"><img src="./assets/css и scss/img/Group 13 1.png" alt="#"></a>
            </div>
        </div>
    </header>
    
    <!-- Основной контент страницы -->
    <section class="main">
        <div class="contener">
            <div class="main-zagl">
                <!-- Заголовок формы -->
                <h1>Заполните информацию</h1>
            </div>
            <div class="main-text">
                <!-- Форма для заполнения заявки -->
                <form method="POST" action="./app/database/zaiavka.php">
                    <input name="name" type="text" placeholder="Имя">
                    <input name="date-of-birth" type="text" placeholder="Дата рождения">
                    <input name="address" type="text" placeholder="Адрес">
                    <input name="telefon" type="text" placeholder="Телефон">
                    <input name="email" type="text" placeholder="Электронная почта">
                    <input name="education" type="text" placeholder="Образование">
                    <input name="work-experience" type="text" placeholder="Опыт работы"> 
                    <input name="qualification" type="text" placeholder="Квалификация">
                    <input name="personal-quality" type="text" placeholder="Личные качества">
                    <!-- Кнопка для отправки формы -->
                    <button id="openModalBtn">Отправить</button>
                </form>
            </div>
        </div>
        
        <!-- Модальное окно после отправки заявки -->
        <div id="myModal" class="zaiavka">
            <div class="zaiavka-content">
                <div class="zaiavka-text">
                    <h1>Спасибо что решили поработать<br>у нас.</h1>
                    <p>Мы рассмотрим вашу заявку и позвоним в <br>случие принятия, ждите.</p>
                </div>
                <div class="zaiavka-close">
                    <!-- Ссылка для возврата на главную страницу -->
                    <a href="./index.php"><img src="./assets/css и scss/img/Arrow 4.png" alt="#">Назад</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Подвал страницы -->
    <footer class="footer">
        <div class="contener">
            <div class="footer-text">
                <!-- Логотип и навигационные ссылки -->
                <img src="./assets/css и scss/img/Group 13 2.png" alt="#">
                <a href="#">Поддержка</a>
                <a href="./index-2.php">Меню</a>
                <a href="./index-7.php">Новости</a>
                <a href="./index-8.php">Контакты</a>
            </div>
        </div>
    </footer>
    
    <!-- Подключение дополнительного JavaScript файла -->
    <script src="./assets/js/Zaiavka.js"></script>
</body>
</html>