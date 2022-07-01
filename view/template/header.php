<?php $siswa = fetch($koneksi, 'siswa', ['id_siswa' => $_SESSION['id_user']]); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $setting['nama_sekolah']; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->


    <link rel="stylesheet" href="dist/css/adminlte.min.css" />

    <link rel="stylesheet" href="http://localhost:8000/assets/modules/izitoast/css/iziToast.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="http://localhost:8000/assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="http://localhost:8000/<?= $setting['logo'] ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8" />
                <span class="brand-text font-weight-light"><?php echo $setting['nama_sekolah']; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($_SESSION['level'] == 'kepala' || $_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="?" class="nav-link">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>Menu Utama</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Master
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="?page=master_peserta" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Peserta</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=master_panitia" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Panitia</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="?page=master_kepala" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kepala Sekolah</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'peserta') { ?>
                            <li class="nav-item">
                                <a href="?page=pendaftaran" class="nav-link">
                                    <i class="nav-icon fas fa-file-signature"></i>
                                    <p>Pendaftaran</p>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($_SESSION['level'] == 'peserta') { ?>
                            <li class="nav-item">
                                <a href="?page=documentpendaftaran" class="nav-link">
                                    <i class="nav-icon fas fa-upload"></i>
                                    <p>Dokumen Pendaftaran</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'peserta' && $siswa['status'] == 2) { ?>
                            <li class="nav-item">
                                <a href="?page=buktipembayaran" class="nav-link">
                                    <i class="nav-icon fas fa-upload"></i>
                                    <p>Dokumen Pembayaran</p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="?page=verifikasipendaftaran" class="nav-link">
                                    <i class="nav-icon fas fa-file-signature"></i>
                                    <p>Verifikasi Pendaftaran</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="?page=verifikasipembayaran" class="nav-link">
                                    <i class="nav-icon fas fa-file-signature"></i>
                                    <p>Verifikasi Pembayaran</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (($_SESSION['level'] == 'peserta' && $siswa['status'] == 2) || ($_SESSION['level'] == 'peserta' && $siswa['status_pay'] == 2)) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Cetak
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if ($_SESSION['level'] == 'peserta' && $siswa['status'] == 2) { ?>
                                        <li class="nav-item">
                                            <a href="?laporan=l_pendaftaran" title="Tunggu Panitia Diterima Berkas Anda" class="nav-link">
                                                <i class="nav-icon fas fa-upload"></i>
                                                <p>Bukti Pendaftaran</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($_SESSION['level'] == 'peserta' && $siswa['status_pay'] == 2) { ?>
                                        <li class="nav-item">
                                            <a href="?laporan=l_pembayaran" title="Tunggu Panitia Diterima Berkas Pembayaran Anda" class="nav-link">
                                                <i class="nav-icon fas fa-upload"></i>
                                                <p>Bukti Pembayaran</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'kepala' || $_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Laporan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="?page=lap_pdb" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Peserta Didik Baru</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['level'] == 'admin') { ?>
                            <li class="nav-item">
                                <a href="?page=master_KepalaSekolah" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="?page=logout" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                        <!-- <li class="nav-header">EXAMPLES</li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Main</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->