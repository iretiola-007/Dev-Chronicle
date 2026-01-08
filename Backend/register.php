<?php
session_start();
require 'config.php'; // db connection settings

if (_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim(_POST['username']);
    $email = trim(_POST['email']);
    $password = password_hash(_POST['password'], PASSWORD_DEFAULT);
    $stmt = pdo->prepare("INSERT INTO craftusers (
        username, email, password) VALUES (?, ?, ?)"
    )

    if (stmt->execute([username,email,password])) {
        // $_SESSION['user_id'] = pdo->lastInsertId();
        // $_SESSION['username'] = $username;
        header("Location: dlogin.php");
        exit;
    } else {
        echo "Error occured. Try again.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required/>
    <input type="email" name="username" placeholder="Email" required/>
    <input type="password" name="password" placeholder="Password" required/>
    <button type="submit">Register</button>
</form>