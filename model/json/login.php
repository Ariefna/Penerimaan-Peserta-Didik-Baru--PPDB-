<?php
include $_SERVER['DOCUMENT_ROOT'] . "/model/koneksi.php";
session_start();
if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_query($koneksi, "select * from user where username='$username' and status='1'");
    $ceklogin = mysqli_num_rows($query);
    $user = mysqli_fetch_array($query);
    $check = false;
    if (isset($user['password'])) {
        $check = password_verify($password, $user['password']);
    } else {
        $check = false;
    }

    if ($ceklogin == 1 && $check) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama_user'];
        $_SESSION['level'] = $user['level'];
        echo "ok";
    } else {
        $query = mysqli_query($koneksi, "select * from siswa where nisn='$username'");
        $ceklogin1 = mysqli_num_rows($query);
        $user1 = mysqli_fetch_array($query);
        if ($ceklogin1 == 1 || password_verify($password, $user1['password'])) {
            $_SESSION['id_user'] = $user1['id_siswa'];
            $_SESSION['nama'] = $user1['nama_siswa'];
            $_SESSION['level'] = 'peserta';
            echo "ok";
        } else {
            echo "Password atau Username Anda salah";
            // echo $ceklogin1 == 1 && password_verify($password, $user['password']);
        }
    }
}
