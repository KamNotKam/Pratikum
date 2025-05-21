<?php
session_start();
require_once "classes/Auth.php";
$auth = new Auth();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($auth->login($username, $password)) {
        if ($_SESSION['level'] == 0) {
            header("Location: pages/admin.php");
            exit;
        } else {
            header("Location: pages/user.php");
            exit;
        }
    } else {
        $error = "❌ Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Login Multi-Level</h2>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <?php if (!empty($error)): ?>
                <div class="message" style="color: red; text-align:center; margin-bottom:10px;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>


        <div class="message">
            <p>admin admin123 | user user123</p>
        </div>
    </div>
</body>
</html>
