<?php
require_once './models/Buku.php';
require_once './views/BukuView.php';

$buku = new Buku();
$data = $buku->getAllBuku();

// Tambahkan pengecekan
if (!is_array($data)) {
    $data = [];
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Buku</h1>
    <div class="table-container">
        <?php tampilkanBuku($data); ?>
    </div>
</body>
</html>
