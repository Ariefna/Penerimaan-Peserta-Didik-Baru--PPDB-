<?php
if (isset($_POST['username'])) {
    $username = htmlentities((trim($_POST['username'])));
    $password = htmlentities(md5($_POST['password']));
    $login = mysqli_query($conn, "select * from tabel_admin where username='$username' and password='$password'");
    $cek_login = mysqli_num_rows($login);
    if (empty($cek_login)) {
?>
        <script language="javascript">
            alert("Username atau password salah");
        </script>
    <?php
    } else {
        while ($row = mysqli_fetch_array($login)) {
            $id_admin = $row['id_admin'];
            $nama = $row['nama'];
            $_SESSION['id_admin'] = $id_admin;
            if ($nama == "kacab") {
                $_SESSION['rule'] = "kacab";
            } elseif ($nama == "keuangan") {
                $_SESSION['rule'] = "keuangan";
            }
        }
    ?>
        <script language="javascript">
            document.location.href = "?page=utama";
        </script>
    <?php
    }
} else {
    // unset($_POST['username']);
    ?>
    <script language="javascript">
        document.location.href = "?page=utama";
    </script>
<?php

}
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
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
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>


    <script>
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
</body>

</html>