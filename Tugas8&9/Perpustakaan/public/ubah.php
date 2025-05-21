<?php
require_once '../config/Database.php';
require_once '../models/Buku.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

// Koneksi database
$database = new Database();
$db = $database->getConnection();

// Ambil data buku
$buku = new Buku($db);
$data = $buku->ambilById($id);

if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Buku</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Ubah Data Buku</h2>
        <form action="proses_ubah.php" method="POST" class="login-form">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" value="<?= $data['judul']; ?>" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" value="<?= $data['pengarang']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?= $data['tahun_terbit']; ?>" required>
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
            <a href="index.php" class="btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>