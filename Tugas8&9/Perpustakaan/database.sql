CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    pengarang VARCHAR(100) NOT NULL,
    tahun_terbit INT(4) NOT NULL
);

INSERT INTO buku (judul, pengarang, tahun_terbit)
VALUES ('Laskar Pelangi', 'Andrea Hirata', 2005);
