<?php
require '../../../config.php';

// Получаем данные из базы
$stmt = $pdo->query("SELECT * FROM catalog WHERE category like '%Фото%'");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Каталог</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="ar.css" />
     <link rel="stylesheet" href="style.css">
     
</head>
<body>
       <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-xxl">
          <a class="navbar-brand" href="#">Каталог</a>
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
                <a class="nav-link" href="../../../index.html">Главная</a>
              </li>
             
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Дополнительно
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">Наши партнёры</a>
                  </li>
                  
                  <li><hr class="dropdown-divider" /></li>
                    <li >
                    <a class="dropdown-item" href="#">О нас</a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="#">Сертификаты</a>
                    </li>
                
                </ul>
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
        <div class="catalog-container-flex">
          <?php foreach ($items as $item): ?>   
              <div class="catalog-item-flex">
                  <h3 class="item-title"><?= htmlspecialchars($item['name']) ?></h3>
                  <?php if ($item['image']): ?>
                      <img class="item-img" src="images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                  <?php endif; ?>
                  <p class="item-desc"><?= htmlspecialchars($item['description']) ?></p>
                  <p class="item-price">Цена: <?= number_format($item['price'], 2) ?> руб.</p>
                  <p class="item-category">Категория: <?= htmlspecialchars($item['category']) ?></p>
                  <button onclick="openRentForm('<?= htmlspecialchars($item['name']) ?>')" class="btn btn-primary">Приобрести</button> 
              </div>  
          <?php endforeach; ?>
        </div>

     
        
<div id="rentForm" class="rent-form" style="display: none;">
    <h2>Оформление аренды</h2>
    <form id="rentFormContent" onsubmit="submitRentForm(event)">
        <div class="form-group">
            <label>Товар:</label>
            <input type="text" id="phoneModel" name="phoneModel" readonly>
        </div>
        <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Ваш email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="days">Количество дней аренды:</label>
            <input type="number" id="days" name="days" min="1" required>
        </div>
        <button type="submit">Подтвердить аренду</button>
    </form>
</div>

<dialog id="myDialog">
    <p>Сообщение отправлено вам на электронную почту</p>
    <button onclick="document.getElementById('myDialog').close()">Закрыть</button>
</dialog>
    </div>
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script src="ar.js"></script>
</body>

</html>