<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>FORM REGISTER</h2>
<form method="post">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <label>Gender</label>
    <select name="gender" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    <button type="submit" name="daftar" class="btn btn-blue">Daftar</button>
    <a href="login.php" class="btn btn-silver" style="display:block;text-align:center;margin-top:10px;">Ke Login</a>
</form>
<?php
if(isset($_POST['daftar'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];
    $cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$user'");
    if(mysqli_num_rows($cek)>0){
        echo "<script>alert('Username sudah ada!');</script>";
    } else {
        $save = mysqli_query($koneksi, 
           "INSERT INTO login VALUES ('$user','$pass','$gender')"
        );
        if($save){
            echo "<script>alert('User berhasil terdaftar'); window.location='login.php';</script>";
        }
    }
}
?>
</div>
</body>
</html>
