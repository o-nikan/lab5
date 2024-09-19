<?php
session_start();

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $password = $_POST['password'] ?? '';
    if (!empty($password)) {
        // код для верификации пароля
    } else {
        // код для обработки ошибки
    }
    // Получаем пользователя из базы данных по имени
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$name]);
    $user = $stmt->fetch();

    // Проверяем, найден ли пользователь и совпадает ли хешированный пароль
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];

        // Проверяем, является ли пользователь администратором
        if ($user['admin'] == 1) {
            // Если да, перенаправляем на страницу администратора
            header('Location: /Pan-Asian-cuisine/index12.php');
            exit();
        } else {
            // Если нет, перенаправляем на обычную страницу пользователя
            header('Location: /Pan-Asian-cuisine/index-10.php');
            exit();
        }
    }
}
?>