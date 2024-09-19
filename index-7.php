<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS файла для стилей страницы -->
    <link rel="stylesheet" href="./assets/css и scss/style-7.css">
    <title>Новости</title>
</head>
<body>
    <!-- Шапка страницы -->
    <header class="header">
        <div class="contener">
            <div class="header-text">
                <!-- Заголовок страницы и логотип с ссылкой на главную страницу -->
                <h1>Новости</h1>
                <a href="./index.php"><img src="./assets/css и scss/img/Group 13 1.png" alt="#"></a>
            </div>
        </div>
    </header>
    
    <!-- Основной контент страницы -->
    <section class="main">
        <div class="contener">
            <?php
            // Параметры подключения к базе данных
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Pan-Asian-cuisine";

            // Создание соединения
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Проверка соединения
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // SQL запрос для получения последних трех новостей
            $sql = "SELECT * FROM news ORDER BY Date DESC LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Вывод данных каждой новости
              while($row = $result->fetch_assoc()) {
                echo "<div class='main-infa'>";
                echo "<div class='main-data'>";
                echo "<h2 class='main-data'>" . $row["Date"]. "</h2>";
                echo "<img src='./assets/css и scss/img/Line 1.png' alt='#'>";   
                echo "</div>";
                echo "<div class='main-text'>";
                echo "<p>" . $row["description"]. "</p>";     
                echo "<img src='./assets/css и scss/img/Group 44.png' alt='#'>";
                echo "</div>";
                echo "</div>";
              }
            }
            // Закрытие соединения с базой данных
            $conn->close();
            ?>
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
</body>
</html>
      