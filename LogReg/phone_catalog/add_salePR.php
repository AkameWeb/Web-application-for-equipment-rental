<?php
require '../../config.php';

// Получение списка оборудования и покупателей
$equipment = $pdo->query("SELECT id, name FROM equipment")->fetchAll(PDO::FETCH_ASSOC);
$customers = $pdo->query("SELECT id, full_name FROM customers")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipment_id = $_POST['equipment_id'];
    $customer_id = $_POST['customer_id'];

    // Вставка данных о продаже в базу данных
    $sql = "INSERT INTO sales (equipment_id, customer_id) VALUES (:equipment_id, :customer_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':equipment_id' => $equipment_id,
        ':customer_id' => $customer_id
    ]);

    echo "Продажа успешно добавлена!";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить продажу</title>
</head>
<body>
    <h1>Добавить новую продажу</h1>
    <form method="POST" action="">
        <label for="equipment_id">Оборудование:</label><br>
        <select id="equipment_id" name="equipment_id" required>
            <?php foreach ($equipment as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo htmlspecialchars($item['name']); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="customer_id">Покупатель:</label><br>
        <select id="customer_id" name="customer_id" required>
            <?php foreach ($customers as $customer): ?>
                <option value="<?php echo $customer['id']; ?>"><?php echo htmlspecialchars($customer['full_name']); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Добавить продажу</button>
    </form>

    <br>
    <a href="catalogPR.php">Перейти к каталогу продаж</a>
</body>
</html>