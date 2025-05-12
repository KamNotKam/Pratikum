<?php
function tampilkanBuku($data) {
    if (empty($data)) {
        echo "<p>Tidak ada data buku.</p>";
        return;
    }

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Judul</th><th>Penulis</th><th>Tahun</th></tr>";
    foreach ($data as $buku) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($buku['judul']) . "</td>";
        echo "<td>" . htmlspecialchars($buku['penulis']) . "</td>";
        echo "<td>" . htmlspecialchars($buku['tahun_terbit']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
