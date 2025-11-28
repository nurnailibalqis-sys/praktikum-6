<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
if (mysqli_num_rows($cek) == 1) {
    $data = mysqli_fetch_assoc($cek);
    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['gender']   = $data['gender'];
        header("Location: home.php");
        exit();
    } else {
        echo "Password salah! <br>";
        echo "<a href='login.php'>Coba lagi</a>";
    }
} else {
    echo "Username tidak ditemukan! <br>";
    echo "<a href='login.php'>Coba lagi</a>";
}
?>
