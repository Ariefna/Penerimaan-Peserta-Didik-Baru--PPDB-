<?php
if (isset($_GET['page'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="http://localhost:8000/<?= $setting['logo'] ?>" />
    <title><?php echo $setting['nama_sekolah']; ?> | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost:8000/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://localhost:8000/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost:8000/dist/css/adminlte.min.css">

    <!-- CSS TOASTR -->
    <link rel="stylesheet" href="http://localhost:8000/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="http://localhost:8000/assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="http://localhost:8000/assets/modules/summernote/summernote-bs4.css">
    <script src="dist/js/demo.js"></script>
    <script src="http://localhost:8000/assets/modules/izitoast/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="http://localhost:8000/<?= $setting['logo'] ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;width: 200px;" />
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Aplikasi Penerimaan Peserta Didik Baru (PPDB)</p>
                <div class="col-md-12">
                    <div class="alert alert-<?= $setting['status_pendaftaran'] == 0 ? "warning" : "success" ?>" role="alert">
                        PPDB Online masih <?= $setting['status_pendaftaran'] == 0 ? "ditutup" : "dibuka" ?>. Terakhir diubah <?= $setting['date'] ?>.
                    </div>
                </div>
                <form id="form-login" action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="NISN / Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $setting['status_pendaftaran'] == 1 ? '<a class="btn btn-secondary text-white btn-block" data-toggle="modal" data-target="#tambahdata">Daftar</a>' : '' ?>
                        </div>

                        <p class="login-box-msg">Perlu bantuan untuk login / Pendaftaran? Dapatkan Bantuan telp <?= $setting['no_telp'] ?>.</p>
                        <a href="https://www.instagram.com/sma.waha1" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" style="font-size:25px;color:black;margin-left:140px"></i> </a>
                        <a href="https://www.facebook.com/SMA-Wachid-Hasyim-1-Surabaya-254558730831/" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook-square" style="font-size:25px;color:black;margin-left:10px"></i></a>

                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- modal register -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" onkeypress="return hanyaAngka(this);" maxlength="10" minlength="10" name="nisn" class="form-control nisn" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Jalur</label>
                            <select class='form-control' name='alumni' onchange="getComboA(this)">
                                <option value='1'>- Umum -</option>
                                <option value='2'>- Alumni -</option>
                                <option value='3'>- Prestasi -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Prestasi</label>
                            <input type="text" id="prestasi" name="prestasi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Kota Asal Sekolah</label>
                            <input type="text" id="kota_sekolah" name="kota_sekolah" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="text" name="password" class="form-control password" required="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="http://localhost:8000/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://localhost:8000/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost:8000/dist/js/adminlte.min.js"></script>


    <script>
        function getComboA(selectObject) {
            var value = selectObject.value;
            if (value == 2) {
                $('#nama_sekolah').val("SMP Wachid Hasyim 1");
                $('#kota_sekolah').val("SURABAYA");
                $("#prestasi").prop('disabled', true);
            } else if (value == 1) {
                $('#nama_sekolah').val("");
                $('#kota_sekolah').val("");
                $("#prestasi").prop('disabled', true);
            } else if (value == 3) {
                $('#nama_sekolah').val("");
                $('#kota_sekolah').val("");
                $("#prestasi").prop('disabled', false);
            }

        }
        $("#prestasi").prop('disabled', true);
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=tambah',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('form button').on("click", function(e) {
                        e.preventDefault();
                    });
                },
                success: function(data) {
                    if (data != 'nisn sudah tersedia' && data != 'NO') {
                        iziToast.success({
                            title: data + ' . . .',
                            message: 'data siswa berhasil disimpan',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            document.location.href = "?page=utama";
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Salah . . .',
                            message: data,
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }

                    $('#tambahdata').modal('hide');
                }
            });
            return false;
        });
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/login.php',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('form button').on("click", function(e) {
                        e.preventDefault();
                    });
                },
                success: function(data) {
                    if (data != 'Password atau Username Anda salah') {
                        iziToast.success({
                            title: data + '. . .',
                            message: 'Selamat Anda berhasil Masuk',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Salah . . .',
                            message: data,
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }

                    $('#tambahdata').modal('hide');
                }
            });
            return false;
        });
        $(".toggle-password").click(function() {
            var input = $($(this).attr("toggle"));
            $(this).toggleClass("fa-eye fa-eye-slash");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        if (localStorage.checkBoxValidation && localStorage.checkBoxValidation != '') {
            $('#customCheck').attr('checked', 'checked');
            $('#username').val(localStorage.userName);
            $('#password').val(localStorage.password);
        } else {
            $('#customCheck').removeAttr('checked');
            $('#username').val('');
            $('#password').val('');
        }
        $('#customCheck').click(function() {
            if ($('#customCheck').is(':checked')) {
                // save username and password
                localStorage.userName = $('#username').val();
                localStorage.password = $('#password').val();
                localStorage.checkBoxValidation = $('#customCheck').val();
            } else {
                localStorage.userName = '';
                localStorage.password = '';
                localStorage.checkBoxValidation = '';
            }
        });
    </script>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
</body>

</html>