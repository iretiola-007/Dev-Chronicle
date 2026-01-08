<?php
session_start();
require 'config.php';

if (_SERVER["REQUEST_METHOD"] ===  "POST") {
    $username = trim(_POST['username']);
    $password = _POST['password']

    $stmt = pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required/>
    <input type="password" name="password" placeholder="Password" required/>
    <submit type="submit">Login</submit>
</form>