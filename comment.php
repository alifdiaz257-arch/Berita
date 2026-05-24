<?php
// STORED XSS - SIMPAN LANGSUNG KE FILE
$name = $_POST['name'];
$comment = $_POST['comment'];

// TIDAK ADA VALIDASI - SAVE RAW
$data = "<div class='comment'><strong>$name</strong>: " . $comment . "</div><hr>";

file_put_contents('comments.txt', $data, FILE_APPEND);
header('Location: index.html');
?>