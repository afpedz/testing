<?php
include '../configs/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"] === "register") {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            echo json_encode(["status" => "error", "message" => "Username already taken"]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            echo json_encode(["status" => "success", "message" => "Registration successful!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Something went wrong"]);
        }
    }

    elseif ($_POST["action"] === "login") {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                echo json_encode(["status" => "success", "message" => "Login successful!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Incorrect Password"]);
            }
        }
    }
}
?>
