<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Перенаправление, если пользователь не авторизован
    exit();
}

echo "Привет, " . $_SESSION['username'] . " ввернитесь на главное окно";
?>