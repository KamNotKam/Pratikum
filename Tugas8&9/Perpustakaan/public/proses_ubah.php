<?php
require_once '../config/Database.php';
require_once '../models/Buku.php';

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);

// Ambil data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun = $_POST['tahun_terbit'];

// Jalankan update
$buku->ubah($id, $judul, $pengarang, $tahun);

// Redirect ke halaman utama
header("Location: index.php");
exit;
