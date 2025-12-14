<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array(); 

// Hancurkan data sesi di server
session_destroy();

// Hapus cookie sesi (optional, tapi baik untuk keamanan)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

header("Location: login.php");
exit;
?>