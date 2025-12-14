<?php
session_start(); 
include "koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($conn, $username); 
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error_message'] = "Username sudah dipakai! Silakan gunakan username lain.";
        header("Location: register.php"); 
        exit;
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')");
        
        if ($insert) {
            $_SESSION['success_message'] = "Pendaftaran berhasil! Silakan masuk menggunakan akun baru Anda.";
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Terjadi kesalahan saat menyimpan data. Coba lagi.";
            header("Location: register.php"); 
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px; 
            text-align: center;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }
        .alert-error { 
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
            padding: 15px; 
            margin-bottom: 20px; 
            border-radius: 6px; 
            text-align: left;
        }
        .link-switch a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .link-switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Register</h2>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert-error">';
        echo '<strong>Gagal!</strong> ' . $_SESSION['error_message'];
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Daftar</button>
    </form>

    <p class="link-switch">Sudah punya akun? <a href="login.php">Login</a></p>
</div>

</body>
</html>