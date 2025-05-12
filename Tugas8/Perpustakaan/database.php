<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosongkan jika pakai XAMPP
$dbname = "db_perpustakaan";

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat database: " . $conn->error;
}

// Pilih database
$conn->select_db($dbname);

// Buat tabel
$sql = "CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    penulis VARCHAR(100),
    tahun_terbit INT
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabel 'buku' berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel: " . $conn->error;
}

// Isi data awal
$sql = "INSERT INTO buku (judul, penulis, tahun_terbit)
        VALUES ('Laskar Pelangi', 'Andrea Hirata', 2005)";
if ($conn->query($sql) === TRUE) {
    echo "Data awal berhasil dimasukkan.";
} else {
    echo "Gagal memasukkan data: " . $conn->error;
}

$conn->close();
?>
