<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$gender   = $_POST['gender'];
$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "Username sudah dipakai, silakan gunakan username lain. <br>";
    echo "<a href='register.php'>Kembali</a>";
    exit();
}
$pass_hash = password_hash($password, PASSWORD_DEFAULT);
$query = mysqli_query($koneksi, "INSERT INTO login VALUES('$username', '$pass_hash', '$gender')");
if ($query) {
    echo "User berhasil terdaftar<br>";
    echo "<a href='login.php'>Klik untuk login</a>";
} else {
    echo "Gagal mendaftar!";
}
?>
