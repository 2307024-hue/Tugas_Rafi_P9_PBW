<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    header('Location: login.php');
    exit;
}
?>
<?php 
include 'check_login.php'; 
?>