<?php
session_start();
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($sql);
        $level = $data['level'];
        if ($level == 'Admin' or $level == 'admin') {
            $_SESSION['admin'] = array(
                'username' => $username,
                'status' => 'login'
            );
            header("location:../index.php");
        } else if ($level == 'user' or $level = 'User') {
            $_SESSION['user'] = array(
                'username' => $username,
                'status' => 'login'
            );
            header('location:page/index.php');
        }
    } else {
        header("location:login.php?pesan=gagal");
    }
}

if (isset($_POST['logout']) == 'logout') {
    $cek = $_POST['cek'];
    if ($cek == 'admin') {
        unset($_SESSION['admin']);
    } else {
        unset($_SESSION['user']);
    }
    header('location:../login.php');
}
?>