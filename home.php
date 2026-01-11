<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
<h2>Selamat Datang!</h2>
<p><b>Username:</b> <?= $_SESSION['username']; ?></p>
<p><b>Gender:</b> <?= isset($_SESSION['gender']) ? $_SESSION['gender'] : '-'; ?></p>
<a href="logout.php" class="btn btn-red">Logout</a>
</div>
</body>
</html>
