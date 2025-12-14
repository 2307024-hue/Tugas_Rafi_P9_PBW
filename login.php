<?php
session_start(); 

if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            border-color: #28a745;
            outline: none;
        }
        
        button[type="submit"] {
            background-color: #28a745; 
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
            background-color: #1e7e34;
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }

        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
            padding: 15px; 
            margin-bottom: 20px; 
            border-radius: 6px; 
            text-align: left;
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
            color: #28a745;
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
    <h2>Login</h2>
    
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert-success">';
        echo '<strong>Sukses!</strong> ' . $_SESSION['success_message'];
        echo '</div>';
        unset($_SESSION['success_message']);
    }
    ?>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert-error">';
        echo '<strong>Gagal!</strong> ' . $_SESSION['error_message'];
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <form action="proses_login.php" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        
        <button type="submit" name="login">Login</button>
    </form>

    <p class="link-switch">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

</body>
</html>