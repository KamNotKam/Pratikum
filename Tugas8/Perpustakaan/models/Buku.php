<?php
require_once './database/Koneksi.php';

class Buku {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->conn;
    }

    public function getAllBuku() {
        $sql = "SELECT * FROM buku";
        $result = $this->conn->query($sql);

        if (!$result) {
            // Gagal query
            return [];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
?>
