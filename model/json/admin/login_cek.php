<?php
if ($_GET['id'] <> '5448dfhcr27467576c78a50vi98j0ruv0w') {
    die('Ip anda sudah tercatat disistem ini');
}
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/model/config/database.php";
//require $_SERVER['DOCUMENT_ROOT'] . "/model/config/function.php";


$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$query = mysqli_query($koneksi, "select * from user where username='$username' and status='1'");
$ceklogin = mysqli_num_rows($query);
$user = mysqli_fetch_array($query);
if ($ceklogin == 1) {
    if (password_verify($password, $user['password'])) {

        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['level'] = $user['level'];
        echo "ok";
    } else {
        echo "salah";
    }
} else {
    echo "oo";
}
