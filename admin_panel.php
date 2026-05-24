<?php
session_start();
// TIDAK ADA VALIDASI SESSION YANG BENAR
if(isset($_COOKIE['session_id']) || isset($_SESSION['admin'])) {
    echo "<h1>ADMIN PANEL - HAPUS BERITA</h1>";
    echo "<form method='POST' action='delete_news.php'>";
    echo "<input type='text' name='news_id' placeholder='ID berita'>";
    echo "<button type='submit'>HAPUS</button>";
    echo "</form>";
    echo "<p><a href='?page=../../config'>Baca file config</a> (Path Traversal)</p>";
} else {
    echo "Lu belum login tai! Coba SQL injection dulu.";
}
?>