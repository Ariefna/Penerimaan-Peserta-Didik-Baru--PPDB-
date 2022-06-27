</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022
        <a href="http://localhost:8000/"><?php echo $setting['nama_sekolah']; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0-rc
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    $('.form-control').keyup(function(event) {
        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=simpan',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('readonly', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('readonly', false);
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        });
    });
</script>

<!-- simpan ayah -->
<script>
    $('.form-control').keyup(function(event) {
        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-dataayah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/mod_siswa/crud_siswa.php?pg=dataayah',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('readonly', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('readonly', false);
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        });
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

<!-- simpan ibu -->
<script>
    $('.form-control').keyup(function(event) {
        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-dataibu').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/mod_siswa/crud_siswa.php?pg=dataibu',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('readonly', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('readonly', false);
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        });
    });
</script>

<!-- simpan wali -->
<script>
    $('.form-control').keyup(function(event) {
        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-datawali').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'model/json/mod_siswa/crud_siswa.php?pg=datawali',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('readonly', true);
                },
                success: function(data) {
                    $('#btnsimpan').prop('readonly', false);
                    iziToast.success({
                        title: 'Jos . . .',
                        message: 'Data Berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        });
    });
</script>



<!-- daerah siswa -->
<script type="text/javascript">
    $(document).ready(function() {



        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab").html(hasil);

                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec").html(hasil);

                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_siswa.php",
                data: data,
                success: function(hasil) {
                    $("#form_des").html(hasil);

                }
            });
        });


    });
</script>

<!-- daerah ayah -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_ayah").show();
        $("#form_kec_ayah").show();
        $("#form_des_ayah").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_ayah").html(hasil);
                    $("#form_kab_ayah").show();
                    $("#form_kec_ayah").show();
                    $("#form_des_ayah").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_ayah").html(hasil);
                    $("#form_kec_ayah").show();
                    $("#form_des_ayah").show();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_ayah", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ayah.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_ayah").html(hasil);
                    $("#form_des_ayah").show();
                }
            });
        });


    });
</script>

<!-- daerah ibu -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_ibu").show();
        $("#form_kec_ibu").show();
        $("#form_des_ibu").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_ibu").html(hasil);
                    $("#form_kab_ibu").show();
                    $("#form_kec_ibu").show();
                    $("#form_des_ibu").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_ibu").html(hasil);
                    $("#form_kec_ibu").show();
                    $("#form_des_ibu").show();
                }
            });
        });

        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_ibu", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_ibu.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_ibu").html(hasil);
                    $("#form_des_ibu").show();
                }
            });
        });


    });
</script>

<!-- daerah wali -->
<script type="text/javascript">
    $(document).ready(function() {

        // sembunyikan form kabupaten, kecamatan dan desa
        $("#form_kab_wali").show();
        $("#form_kec_wali").show();
        $("#form_des_wali").show();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#form_prov_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kabupaten";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_kab_wali").html(hasil);
                    $("#form_kab_wali").show();
                    $("#form_kec_wali").show();
                    $("#form_des_wali").show();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#form_kab_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_kec_wali").html(hasil);
                    $("#form_kec_wali").show();
                    $("#form_des_wali").show();
                }
            });
        });

        function onInput(id) {
            var valuenya = $(this).val();
            $('#' + id).val(valuenya);
        }
        // ambil data desa ketika data memilih kecamatan/kota
        $('body').on("change", "#form_kec_wali", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=desa";
            $.ajax({
                type: 'POST',
                url: "model/json/mod_siswa/daerah_wali.php",
                data: data,
                success: function(hasil) {
                    $("#form_des_wali").html(hasil);
                    $("#form_des_wali").show();
                }
            });
        });


    });
</script>

<!-- STATUS IBU -->
<script>
    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=domisili_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=domisili_ibu]").val($("input[name=domisili_ayah]").val());
        } else {
            $("input[name=domisili_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("select[name=status_tmp_tinggal_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("select[name=status_tmp_tinggal_ibu]").val($("select[name=status_tmp_tinggal_ayah]").val());
        } else {
            $("select[name=status_tmp_tinggal_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=prov_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=prov_ibu]").val($("input[name=prov_ayah]").val());
        } else {
            $("input[name=prov_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kab_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kab_ibu]").val($("input[name=kab_ayah]").val());
        } else {
            $("input[name=kab_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kec_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kec_ibu]").val($("input[name=kec_ayah]").val());
        } else {
            $("input[name=kec_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=desa_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=desa_ibu]").val($("input[name=desa_ayah]").val());
        } else {
            $("input[name=desa_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=alamat_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=alamat_ibu]").val($("input[name=alamat_ayah]").val());
        } else {
            $("input[name=alamat_ibu]").Attr("readonly", true);
        }
    });

    $("select[name=status_tinggal_ibu]").change(function() {
        var status_tinggal_ibu = $(this).val();

        if (status_tinggal_ibu == 'Beda Dengan Ayah') {
            $("input[name=kodepos_ibu]").removeAttr("readonly");
        } else if (status_tinggal_ibu == 'Sama Dengan Ayah') {
            $("input[name=kodepos_ibu]").val($("input[name=kodepos_ayah]").val());
        } else {
            $("input[name=kodepos_ibu]").Attr("readonly", true);
        }
    });
</script>


<!-- STATUS WALI -->

<script>
    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=nama_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=nama_wali]").val($("input[name=nama_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=nama_wali]").val($("input[name=nama_ibu]").val());
        } else {
            $("input[name=nama_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=warga_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=warga_wali]").val($("select[name=warga_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=warga_wali]").val($("select[name=warga_ibu]").val());
        } else {
            $("select[name=warga_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=nik_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=nik_wali]").val($("input[name=nik_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=nik_wali]").val($("input[name=nik_ibu]").val());
        } else {
            $("input[name=nik_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=tempat_lahir_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=tempat_lahir_wali]").val($("input[name=tempat_lahir_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=tempat_lahir_wali]").val($("input[name=tempat_lahir_ibu]").val());
        } else {
            $("input[name=tempat_lahir_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=tgl_lahir_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=tgl_lahir_wali]").val($("input[name=tgl_lahir_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=tgl_lahir_wali]").val($("input[name=tgl_lahir_ibu]").val());
        } else {
            $("input[name=tgl_lahir_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=pendidikan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=pendidikan_wali]").val($("select[name=pendidikan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=pendidikan_wali]").val($("select[name=pendidikan_ibu]").val());
        } else {
            $("select[name=pendidikan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=pekerjaan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=pekerjaan_wali]").val($("select[name=pekerjaan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=pekerjaan_wali]").val($("select[name=pekerjaan_ibu]").val());
        } else {
            $("select[name=pekerjaan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("select[name=penghasilan_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("select[name=penghasilan_wali]").val($("select[name=penghasilan_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("select[name=penghasilan_wali]").val($("select[name=penghasilan_ibu]").val());
        } else {
            $("select[name=penghasilan_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=no_hp_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=no_hp_wali]").val($("input[name=no_hp_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=no_hp_wali]").val($("input[name=no_hp_ibu]").val());
        } else {
            $("input[name=no_hp_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=prov_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=prov_wali]").val($("input[name=prov_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=prov_wali]").val($("input[name=prov_ibu]").val());
        } else {
            $("input[name=prov_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kab_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kab_wali]").val($("input[name=kab_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kab_wali]").val($("input[name=kab_ibu]").val());
        } else {
            $("input[name=kab_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kec_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kec_wali]").val($("input[name=kec_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kec_wali]").val($("input[name=kec_ibu]").val());
        } else {
            $("input[name=kec_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=desa_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=desa_wali]").val($("input[name=desa_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=desa_wali]").val($("input[name=desa_ibu]").val());
        } else {
            $("input[name=desa_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=alamat_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=alamat_wali]").val($("input[name=alamat_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=alamat_wali]").val($("input[name=alamat_ibu]").val());
        } else {
            $("input[name=alamat_wali]").attr("readonly", true);
        }
    });

    $("input[name=status_wali]").change(function() {
        var status_wali = $(this).val();

        if (status_wali == 'Lainnya') {
            $("input[name=kodepos_wali]").removeAttr("readonly");
        } else if (status_wali == 'Sama Dengan Ayah') {
            $("input[name=kodepos_wali]").val($("input[name=kodepos_ayah]").val());
        } else if (status_wali == 'Sama Dengan Ibu') {
            $("input[name=kodepos_wali]").val($("input[name=kodepos_ibu]").val());
        } else {
            $("input[name=kodepos_wali]").attr("readonly", true);
        }
    });
</script>
</body>

</html>