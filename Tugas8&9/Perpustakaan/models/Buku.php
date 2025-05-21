<?php
class Buku {
    private $conn;
    private $table_name = "buku";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tampilSemua() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function tambah() {
        $query = "INSERT INTO buku (judul, pengarang, tahun_terbit) VALUES (:judul, :pengarang, :tahun_terbit)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $this->judul);
        $stmt->bindParam(':pengarang', $this->pengarang);
        $stmt->bindParam(':tahun_terbit', $this->tahun_terbit);

        return $stmt->execute();
    }


    public function getById($id){
        $stmt = $this->db->prepare("SELECT * FROM buku WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function ubah($id, $judul, $pengarang, $tahun) {
        $query = "UPDATE " . $this->table_name . " SET judul = ?, pengarang = ?, tahun_terbit = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$judul, $pengarang, $tahun, $id]);
    }

    public function hapus($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    public function ambilById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
