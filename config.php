<?php
    $host = '127.127.126.26';       // Хост базы данных
    $dbname = 'equipment_catalog'; // Имя базы данных
    $username = 'root';        // Имя пользователя базы данных
    $password = '';            // Пароль базы данных

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Ошибка подключения к базе данных: " . $e->getMessage());
    }
?>