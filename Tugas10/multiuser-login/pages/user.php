<?php
require_once "../classes/Auth.php";
$auth = new Auth();

if (!$auth->isLoggedIn() || $auth->getUserLevel() != 1) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="page-container">
        <h2>Selamat datang, <?= $_SESSION['username'] ?>!</h2>
        <p>Ini adalah halaman untuk pengguna biasa.</p>
        <a class="logout-link" href="../logout.php">Logout</a>
    </div>
</body>
</html>
