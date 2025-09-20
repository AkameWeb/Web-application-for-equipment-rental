<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ищем пользователя по имени
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
       
        echo "Login successful!";
        // Здесь можно начать сессию и перенаправить пользователя
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php"); // Перенаправление на защищенную страницу
    } 
    if ($username === 'admin' && $password === 'admin') {
        // Перенаправляем на другую страницу
        header("Location: phone_catalog/index.php");
        exit(); // Останавливаем выполнение скрипта
    }
   
    else {
        echo "Invalid username or password!";
    }

}
?>