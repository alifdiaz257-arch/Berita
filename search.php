<?php
// TIDAK ADA SANITASI - XSS LANGSUNG
$query = $_GET['q'];
echo "<!DOCTYPE html>";
echo "<html><head><title>Hasil Pencarian</title><link rel='stylesheet' href='style.css'></head><body>";
echo "<div class='container' style='margin-top:50px'>";
echo "<h2>Hasil pencarian untuk: " . $query . "</h2>"; // <-- XSS DI SINI!
echo "<p>Menampilkan " . rand(1,10) . " hasil (mock data)</p>";
echo "<ul>";
for($i=1; $i<=5; $i++) {
    echo "<li>Berita palsu ke-$i tentang '$query'</li>";
}
echo "</ul>";
echo "<p class='vuln-badge'>[VULN] XSS Reflected aktif - coba masukin &lt;script&gt;alert(1)&lt;/script&gt;</p>";
echo "<a href='index.html'>Kembali</a>";
echo "</div></body></html>";
?>