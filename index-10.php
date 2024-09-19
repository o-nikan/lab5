<?php
session_start();
require_once './app/database/login_handler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Санируем ввод
    $name = htmlspecialchars($_POST['username']);
    $table = htmlspecialchars($_POST['table']);
    $time = htmlspecialchars($_POST['time']);

    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];

        // Проверьте правильность полей и их порядок
        $stmt = $pdo->prepare("INSERT INTO `broni` (`data`, `table`, `number-of-people`, `status`, `payment`, `ID_user`) VALUES (?, ?, ?, 'забронирован', '', ?)");
        $stmt->execute([$time, $table, 1, $user_id]); // Убедитесь, что порядок параметров соответствует запросу
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS файла для стилей страницы -->
    <link rel="stylesheet" href="./assets/css и scss/style-10.css">
    <!-- Подключение JavaScript файла -->
    <script src="./js/java.js"></script>
    <title>Профиль</title>
</head>
<body>
    <!-- Шапка страницы -->
    <header class="header">
        <div class="contener">
            <div class="header-text">
                <h1>Профиль</h1>
                <!-- Ссылка на главную страницу -->
                <a href="./index.php"><img src="./assets/css и scss/img/Group 13 1.png" alt="#"></a>
            </div>
        </div>
    </header>
    <!-- Основной раздел страницы -->
    <section class="main">
        <div class="contener">
            <div class="main-sdvig">
                <div class="main-nik">
                    <h2>Пользователь</h2>
                    <p>Личная информация</p>
                </div>
            </div>
            <div class="main-bron">
                <h2>Забронировать место</h2>
                <!-- Форма для бронирования места -->
                <form method="post" action="">
                    <input type="text" name="username" placeholder="Имя">
                    <input type="text" name="table" placeholder="Номер места">
                    <input type="text" name="time" placeholder="Дата">
                    <div class="main-button">
                        <button type="submit">Принять</button>
                    </div>
                </form>
            </div>
            <div class="main-zabronirovano">
                <div>
                    <h2>Забронированное место</h2>
                    <?php
                    // Отображение информации о забронированном месте для текущего пользователя
                    if (isset($_SESSION['id'])) {
                        $user_id = $_SESSION['id'];
                        $stmt = $pdo->prepare("SELECT `table`, `data` FROM `broni` WHERE `ID_user` = ? AND `status` = 'забронирован';");
                        $stmt->execute([$user_id]);
                        $reservation = $stmt->fetch();

                        if ($reservation) {
                            echo '<div class="main-text">';
                            echo '<div class="main-p">';
                            echo '<p>Номер столика:</p>';
                            echo '<p>Время бронирования:</p>';
                            echo '</div>';
                            echo '<div class="main-span">';
                            echo '<span>' . $reservation['table'] . '</span><br><br>';
                            echo '<span>' . $reservation['data'] . '</span>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<p>У вас пока нет забронированных мест</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Футер страницы -->
    <footer class="footer">
        <div class="contener">
            <div class="footer-text">
                <img src="./assets/css и scss/img/Group 13 2.png" alt="#">
                <a href="#">Поддержка</a>
                <a href="./index-2.php">Меню</a>
                <a href="./index-7.php">Новости</a>
                <a href="./index-8.php">Контакты</a>
            </div>
        </div>
    </footer> 
</body>
</html>