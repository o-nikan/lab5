<?php
session_start(); // Стартуем сессию для работы с данными пользователя
require_once './app/database/db.php'; // Подключаем файл для работы с базой данных

// Обработка POST-запросов
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значения из формы
    $table = $_POST['table'];
    $id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['value'];
    $action = $_POST['action'];

    // Валидация данных
    if (empty($table) || empty($column) || empty($action)) {
        // Вернуть ошибку: не все поля заполнены
    } else {
        // Подготовка SQL-запроса в зависимости от действия
        switch ($action) {
            case 'add':
                $stmt = $pdo->prepare("INSERT INTO `$table` (`$column`) VALUES (?)");
                $stmt->execute([$value]); // Добавляем новое значение в таблицу
                break;
            case 'edit':
                if (empty($id)) {
                    // Вернуть ошибку: не указан ID
                } else {
                    $stmt = $pdo->prepare("UPDATE `$table` SET `$column` =? WHERE `id` =?");
                    $stmt->execute([$value, $id]); // Обновляем значение в таблице по ID
                }
                break;
            case 'delete':
                if (empty($id)) {
                    // Вернуть ошибку: не указан ID
                } else {
                    $stmt = $pdo->prepare("DELETE FROM `$table` WHERE `id` =?");
                    $stmt->execute([$id]); // Удаляем запись из таблицы по ID
                }
                break;
        }
    }
}

$stmt = $pdo->query("SHOW FULL TABLES");
$tablesInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
$tables = array();
foreach ($tablesInfo as $tableInfo) {
    if ($tableInfo['Table_type'] == 'BASE TABLE') {
        $tables[] = $tableInfo['Tables_in_' . $pdo->query("SELECT DATABASE()")->fetchColumn()];
    }
}
// Получаем список всех представлений из базы данных
$stmt = $pdo->query("SHOW FULL TABLES WHERE TABLE_TYPE = 'VIEW'");
$views = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = []; // Массив для хранения данных из всех таблиц
$viewData = []; // Массив для хранения данных из всех представлений

try {
    foreach ($tables as $table) {
        // Получаем данные из каждой таблицы
        $stmt = $pdo->query("SELECT * FROM `$table`");
        $data[$table] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    foreach ($views as $view) {
        $viewName = array_values($view)[0];
        // Получаем данные из каждого представления
        $stmt = $pdo->query("SELECT * FROM `$viewName`");
        $viewData[$viewName] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Ошибка запроса: ". $e->getMessage()); // Обработка ошибок при выполнении запросов
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Администрирование БД</title>
</head>
<body>
    <h1>Таблицы в базе данных</h1>
    <?php foreach ($data as $tableName => $rows):?>
        <h2><?php echo htmlspecialchars($tableName);?></h2>
        <table border="1">
            <thead>
                <tr>
                    <?php if (!empty($rows)):?>
                        <?php foreach ($rows[0] as $columnName => $value):?>
                            <th><?php echo htmlspecialchars($columnName);?></th> <!-- Заголовки столбцов -->
                        <?php endforeach;?>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row):?>
                    <tr>
                        <?php foreach ($row as $columnName => $value):?>
                            <td><?php echo htmlspecialchars($value);?></td> <!-- Значения ячеек -->
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <form action="" method="post">
            <!-- Форма для управления записями таблицы -->
            <input type="hidden" name="table" value="<?php echo htmlspecialchars($tableName);?>">
            <input type="text" name="id" placeholder="ID">
            <input type="text" name="column" placeholder="Название столбца">
            <input type="text" name="value" placeholder="Значение">
            <button type="submit" name="action" value="add">Добавить</button>
            <button type="submit" name="action" value="edit">Изменить</button>
            <button type="submit" name="action" value="delete">Удалить</button>
        </form>
    <?php endforeach;?>

    <h1>Представления в базе данных</h1>
    <?php foreach ($viewData as $viewName => $rows):?>
        <h2><?php echo htmlspecialchars($viewName);?></h2>
        <table border="1">
            <thead>
                <tr>
                    <?php if (!empty($rows)):?>
                        <?php foreach ($rows[0] as $columnName => $value):?>
                            <th><?php echo htmlspecialchars($columnName);?></th> <!-- Заголовки столбцов представления -->
                        <?php endforeach;?>
                    <?php endif;?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row):?>
                    <tr>
                        <?php foreach ($row as $columnName => $value):?>
                            <td><?php echo htmlspecialchars($value);?></td> <!-- Значения ячеек представления -->
                        <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php endforeach;?>
</body>
</html>