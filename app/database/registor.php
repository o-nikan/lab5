<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $telefon = $_POST['telefon'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Проверка совпадения пароля и подтверждения пароля
    if ($password !== $confirmPassword) {
        // Если пароль и подтверждение не совпадают, выводим сообщение пользователю
        echo "Пароли не совпадают";
        exit(); // Останавливаем выполнение скрипта
    }

    // Хешируем пароль
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Добавьте значение по умолчанию для поля 'admin' (например, 0)
    $admin = 0;

    // Подготовленный запрос для предотвращения SQL инъекций
    $stmt = $pdo->prepare("INSERT INTO users (username, telefon, password, admin) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $telefon, $hashedPassword, $admin]);

    $error = true;
    $secret = '6Lczt_0pAAAAAKLhoDqti20HJJwYwAAyxGHO_GJA';
    
    if (!empty($_POST['g-recaptcha-response'])) {
        $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $out = curl_exec($curl);
        curl_close($curl);
        
        $out = json_decode($out);
        if ($out->success == true) {
            $error = false;
        } 
    }
        
    if ($error) {
        echo 'Ошибка заполнения капчи.';
    }

    header('Location: /Pan-Asian-cuisine/index.php');
    exit();
}
?>




