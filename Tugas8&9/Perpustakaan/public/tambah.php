<?php
require_once '../config/Database.php';
require_once '../models/Buku.php';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $buku = new Buku($db);
    $buku->judul = $_POST['judul'];
    $buku->pengarang = $_POST['pengarang'];
    $buku->tahun_terbit = $_POST['tahun_terbit'];

    if ($buku->tambah()) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menambahkan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Tambah Buku</h2>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><?= $error; ?></p>
        <?php endif; ?>

        <form action="" method="POST" class="login-form">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" required>
            </div>

            <button type="submit" class="btn">Simpan</button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
