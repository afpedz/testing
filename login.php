<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "<p>Invalid credentials</p>";
    }
}
?>

<link rel="stylesheet" href="style.css">
<form method="post">
    <input type="text" name="username" required placeholder="Username">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
<p class="footer">Register <a href="register.php">Here</a></p>