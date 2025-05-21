<?php
require_once '../config/Database.php';
require_once '../models/Buku.php';

// Buat koneksi ke database
$database = new Database();
$db = $database->getConnection();

// Kirim koneksi ke class Buku
$buku = new Buku($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun_terbit'];

    $buku->tambah($judul, $pengarang, $tahun);

    header('Location: index.php');
    exit();
}
