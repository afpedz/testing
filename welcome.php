<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="logout.php">Logout</a>