<?php

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Проверка совпадения паролей
    if ($password !== $confirmPassword) {
        die("Passwords do not match!");
    }

    // Хеширование пароля
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Проверка, существует ли пользователь с таким именем или email
    $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email
    ]);

    if ($stmt->rowCount() > 0) {
        die("Username or email already exists!");
    }

    // Добавление нового пользователя
    $sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password_hash' => $password_hash
    ]);

    

    if (!isset($_SESSION['user_id'])) {
        header("Location: UserAv.html"); // Перенаправление, если пользователь не авторизован
        exit();
    }

    echo "Welcome, " . $_SESSION['username'] . "!";
}
?>