<?php
require_once "../config/Database.php";
require_once "../models/Buku.php";

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);
$data = $buku->tampilSemua();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Buku Perpustakaan</h2>

        <div class="tambah-wrapper">
            <a href="tambah.php" class="tambah-btn">+ Tambah Buku</a>
        </div>
        
        <table border="1">
        <thead>
            <tr>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../config/Database.php';
            require_once '../models/Buku.php';

            $database = new Database();
            $db = $database->getConnection();

            $buku = new Buku($db);
            $result = $buku->tampilSemua();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['judul']}</td>
                        <td>{$row['pengarang']}</td>
                        <td>{$row['tahun_terbit']}</td>
                        <td>
                        <a href='ubah.php?id={$row['id']}' class='aksi-btn ubah'>Ubah</a>
                        <a href='hapus.php?id={$row['id']}' class='aksi-btn hapus' onclick=\"return confirm('Yakin ingin menghapus buku ini?')\">Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
        </table>
    </div>


    <script>
    function konfirmasiHapus(id) {
        if (confirm("Apakah kamu yakin ingin menghapus data ini?")) {
            window.location.href = "hapus.php?id=" + id;
        }
    }
    </script>

</body>
</html>
