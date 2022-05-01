<!-- start koneksi -->
<?php include 'model/koneksi.php'; ?>
<?php
$waktu = getdate();
$waktu2 = date("Y-m-d H:i:s");
session_start();
if (isset($_SESSION['nama'])) {
?>
    <!-- Model -->
    <?php //include 'model/db.php'; 
    ?>
    <!-- Header -->
    <?php include 'view/template/header.php'; ?>
    <!-- Start alert -->
    <?php include 'view/template/alert.php'; ?>
    <!-- Begin Page Content -->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $halaman = "view/$page.php";
        if (!file_exists($halaman) || empty($page)) {
            include "view/404.php";
        } else {
            include "$halaman";
        }
    } else {
        include 'view/home.php';
    }
    ?>
    <!-- Footer -->
    <?php include 'view/template/footer.php'; ?>
    <!-- End of Footer -->
<?php
} else {
    include 'view/login.php';
}
?>