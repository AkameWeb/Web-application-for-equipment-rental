<?php
require '../../config.php';

// Получение данных о продажах
$sql = "
    SELECT sales.id, equipment_pr.name AS equipment_name, customers.full_name, sales.sale_date
    FROM sales
    JOIN equipment_pr ON sales.equipment_id = equipment_pr.id
    JOIN customers ON sales.customer_id = customers.id
    ORDER BY sales.sale_date DESC
";
$stmt = $pdo->query($sql);
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <meta charset="UTF-8">
    <title>Каталог продаж</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-xxl">
          <a class="navbar-brand" href="Arenda.html">Аренда оборудования</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/LogReg/phone_catalog/catalog/adminAdd_item.php">Каталог</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../../index.html">Главная</a>
              </li>
              <li>
                <a class="nav-link" href="index.php">Оформление аренды</a>
                </li>
                <li>
                    <a class="nav-link" href="indexPR.php">Оформление продажи</a>
                </li> 
            </ul>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="Поиск"
                placeholder="Поиск"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Поиск
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <h1>Каталог продаж</h1>
    <table>
        <tr>
            <th>Оборудование</th>
            <th>Покупатель</th>
            <th>Дата продажи</th>
        </tr>
        <?php foreach ($sales as $sale): ?>
        <tr>
            <td><?php echo htmlspecialchars($sale['equipment_name']); ?></td>
            <td><?php echo htmlspecialchars($sale['full_name']); ?></td>
            <td><?php echo htmlspecialchars($sale['sale_date']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="add_salePR.php">Добавить новую продажу</a>
</body>
</html>