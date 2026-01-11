<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>LOGIN</h2>
<form method="post">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit" name="login" class="btn btn-green">Login</button>
    <a href="register.php" class="btn btn-silver" style="display:block;text-align:center;margin-top:10px;">Daftar Akun</a>
</form>
<?php
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = mysqli_query($koneksi,
       "SELECT * FROM login WHERE username='$user' AND password='$pass'"
    );
    if(mysqli_num_rows($sql)==1){
        $data = mysqli_fetch_array($sql);
        $_SESSION['username'] = $data['username'];
        $_SESSION['gender']   = $data['gender'];

        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Login gagal! Username/password salah');</script>";
    }
}
?>
</div>
</body>
</html>
