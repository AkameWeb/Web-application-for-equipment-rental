<?php
require '../../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    // Обработка загрузки изображения
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        $image = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
    }
    
    $stmt = $pdo->prepare("INSERT INTO catalog (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $category, $image]);
    
    header('Location: ../catalog.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>
    <h1>Добавить новый товар</h1>
    <form method="post" enctype="multipart/form-data">
        <div>
            <label>Название:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Описание:</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label>Цена:</label>
            <input type="number" name="price" step="0.01" required>
        </div>
        <div>
            <label>Категория:</label>
            <input type="text" name="category">
        </div>
        <div>
            <label>Изображение:</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Добавить товар</button>
    </form>
</body>
</html>