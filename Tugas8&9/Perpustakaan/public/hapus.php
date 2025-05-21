<?php
require_once '../config/Database.php';
require_once '../models/Buku.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);

// Hapus data
$buku->hapus($id);

// Kembali ke halaman utama
header("Location: index.php");
exit;
