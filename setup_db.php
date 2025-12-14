<?php
$host = 'localhost';
$user = 'root'; 
$pass = ''; 
$db   = 'db_login';

$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    echo "Koneksi ke MySQL gagal: " . mysqli_connect_error();
    exit;
}

$sql = "CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if (mysqli_query($conn, $sql)) {
    echo "Database <strong>$db</strong> sudah ada / berhasil dibuat.<br>";
} else {
    echo "Gagal membuat database: " . mysqli_error($conn);
    exit;
}

if (!mysqli_select_db($conn, $db)) {
    echo "Gagal memilih database: " . mysqli_error($conn);
    exit;
}

$table_sql = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (mysqli_query($conn, $table_sql)) {
    echo "Tabel <strong>users</strong> sudah ada / berhasil dibuat.<br>";
} else {
    echo "Gagal membuat tabel users: " . mysqli_error($conn);
    exit;
}

echo "<p>Selesai. Anda bisa menutup atau menghapus file ini setelah pengecekan.</p>";
echo "<p><a href=\"login.php\">Buka Login</a> — <a href=\"register.php\">Daftar</a> — <a href=\"/phpmyadmin\">phpMyAdmin</a></p>";

mysqli_close($conn);
?>