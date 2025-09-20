<?php
require '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Вставка данных в базу данных
    $sql = "INSERT INTO equipment (name, description, price) VALUES (:name, :description, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price
    ]);

    echo "Оборудование успешно добавлено!";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить оборудование</title>
</head>
<body>
    <h1>Добавить новое оборудование</h1>
    <form method="POST" action="">
        <label for="name">Название:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Описание:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">Цена:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <button type="submit">Добавить</button>
    </form>

    <br>
    <a href="catalog.php">Перейти к каталогу</a>
</body>
</html>