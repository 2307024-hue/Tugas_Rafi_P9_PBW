<?php
session_start();
include "koneksi.php"; 


if (isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username); 

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    
    if ($query && mysqli_num_rows($query) > 0) {
        
        $data  = mysqli_fetch_assoc($query);

        if (password_verify($password, $data['password'])) {
            
            $_SESSION['user'] = $data['username'];
            $_SESSION['status'] = 'login';
            
            $_SESSION['success_message'] = "Login berhasil! Selamat datang, " . $data['username'] . "."; 
            
            header("Location: home.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Username atau password salah!";
            header("Location: login.php");
            exit;
        }
        
    } else {
        $_SESSION['error_message'] = "Username atau password salah!";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>