<?php
// TIDAK ADA PREPARED STATEMENT - LANGSUNG CONCAT
$username = $_POST['username'];
$password = $_POST['password'];

// DATABASE MOCK PAKE FILE JSON (BIAR GAMPANG)
$users = [
    ['username' => 'admin', 'password' => 'admin123'],
    ['username' => 'editor', 'password' => 'editor456']
];

// INI RENTAN SQL INJECTION - GW BUAT LOGIKA YANG BISA DIBYPASS
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

// SIMULASI QUERY
$login_success = false;
foreach($users as $user) {
    if($user['username'] == $username && $user['password'] == $password) {
        $login_success = true;
    }
}

// BYPASS PAKE ' OR '1'='1
if($username == "' or '1'='1" || strpos($username, "' OR '1'='1") !== false) {
    $login_success = true;
    echo "<h3 style='color:green'>🔥 LOGIN BERHASIL! LU BERHASIL SQL INJECTION 🔥</h3>";
    echo "<pre>Username yang lu masukin: $username</pre>";
    echo "<p>Selamat, lu sekarang admin! Bisa hapus semua berita.</p>";
}

if($login_success) {
    session_start();
    $_SESSION['admin'] = true;
    setcookie("session_id", md5(rand()), 0, "/"); // SESSION ID DI COOKIE RENTAN
    echo "<h2>WELCOME ADMIN, $username</h2>";
    echo "<a href='admin_panel.php'>Masuk Panel Admin</a>";
} else {
    echo "<h2 style='color:red'>LOGIN GAGAL GOBLOK!</h2>";
    echo "<a href='index.html'>Coba lagi tai</a>";
}

// TAMPILIN ERROR QUERY BIASA KELUAR - INFO LEAK
echo "<!-- DEBUG: $sql -->";
?>