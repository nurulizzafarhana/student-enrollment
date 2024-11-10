<?php
session_start();
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$queryLogin = mysqli_query($db, "SELECT * FROM user WHERE email='$email'");
if (mysqli_num_rows($queryLogin) > 0) {
    $rowUser = mysqli_fetch_assoc($queryLogin);
    if ($rowUser['password'] == $password) {
        $_SESSION['NAMA'] = $rowUser['nama_lengkap'];
        $_SESSION['ID'] = $rowUser['id'];
        $_SESSION['id_user'] = $rowUser['id_user'];
        
        header("Location: index.php?login=berhasil");  // Ganti ke halaman yang sesuai
        exit();
    }
} else {
    header("Location: login.php?error=login");
    exit();
}
?>
