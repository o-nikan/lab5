<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Собираем данные из формы
    $name = $_POST['name'];
    $dateOfBirth = $_POST['date-of-birth'];
    $address = $_POST['address'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $workExperience = $_POST['work-experience'];
    $qualification = $_POST['qualification'];
    $personalQuality = $_POST['personal-quality'];

    // Подготавливаем SQL-запрос
    $query = "INSERT INTO `application` (`name`, `date-of-birth`, `address`, `telefon`, `email`, `education`, `work-experience`, `qualification`, `personal-quality`) VALUES (:name, :dateOfBirth, :address, :telefon, :email, :education, :workExperience, :qualification, :personalQuality)";

    // Подготавливаем запрос к выполнению
    $stmt = $pdo->prepare($query);

    // Привязываем переменные к параметрам запроса
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':dateOfBirth', $dateOfBirth);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':education', $education);
    $stmt->bindParam(':workExperience', $workExperience);
    $stmt->bindParam(':qualification', $qualification);
    $stmt->bindParam(':personalQuality', $personalQuality);

    // Выполняем запрос
    $stmt->execute();

    header('Location: /Pan-Asian-cuisine/index.php');
    exit();
}
?>




