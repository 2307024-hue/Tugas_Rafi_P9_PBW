<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
            padding: 15px; 
            margin-bottom: 25px; 
            border-radius: 6px; 
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .logout-btn {
            display: inline-block;
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert-success">';
    echo '<strong>SUKSES!</strong> ' . $_SESSION['success_message'];
    echo '</div>';
    
    unset($_SESSION['success_message']);
}
?>

<h2>Selamat Datang di Dashboard, <?php echo $_SESSION['user']; ?>!</h2>

<p>Ini adalah halaman yang dilindungi. Anda berhasil login ke sistem.</p>

<a href="logout.php" class="logout-btn">Logout</a>

</body>
</html>