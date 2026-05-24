<?php
if(file_exists('comments.txt')) {
    echo file_get_contents('comments.txt'); // LANGSUNG RENDER - STORED XSS
} else {
    echo "<p>Belum ada komentar. jadi yang pertama tai!</p>";
}
?>