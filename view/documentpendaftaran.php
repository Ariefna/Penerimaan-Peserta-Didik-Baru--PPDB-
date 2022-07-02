<?php $siswa = fetch($koneksi, 'siswa', ['id_siswa' => $_SESSION['id_user']]); ?>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php if ($_SESSION['level'] == 'peserta' && $siswa['status_pay'] == 1) { ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        selamat <?= $_SESSION['nama']; ?> calon peserta didik baru <?= $setting['nama_sekolah']; ?> .
                    </div>
                </div>
            <?php } ?>
            <?php if ($_SESSION['level'] == 'peserta' && $siswa['file_pembayaran'] == null && $siswa['status'] == 2) { ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        Peringatan,<?= $_SESSION['nama']; ?> belum melakukan upload dokumen pembayaran.
                    </div>
                </div>
            <?php } ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dokumen Pendaftaran</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-berkas">
                            <input type="hidden" name="id_siswa" value="<?= $_SESSION['id_user'] ?>">
                            <div class="card" id="berkas-card">
                                <div class="card-body">
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Kartu Keluarga</label>
                                        <div class="col-sm-6 col-md-9">

                                            <div class="custom-file">
                                                <input type="file" name="file_kk" class="custom-file-input" id="site-kk">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <? if (isset($siswa['file_kk'])) { ?>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                                            <div class="col-sm-6 col-md-6">
                                                <img src="http://localhost:8000/assets/upload/kk/<?= $siswa['file_kk'] ?>" class="img-thumbnail" width="50%">
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Akta Kelahiran</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="file_akte" class="custom-file-input" id="site-akta">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <? if (!isset($siswa['file_akte'])) { ?>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                                            <div class="col-sm-6 col-md-6">
                                                <img src="http://localhost:8000/assets/upload/akta/<?= $siswa['file_akte'] ?>" class="img-thumbnail" width="50%">
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Ijazah/SKL</label>
                                        <div class="col-sm-6 col-md-9">

                                            <div class="custom-file">
                                                <input type="file" name="file_ijazah" class="custom-file-input" id="site-ijazah">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <? if (isset($siswa['file_ijazah'])) { ?>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                                            <div class="col-sm-6 col-md-6">
                                                <img src="http://localhost:8000/assets/upload/ijazah/<?= $siswa['file_ijazah'] ?>" class="img-thumbnail" width="50%">
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Kartu Indonesia Pintar</label>
                                        <div class="col-sm-6 col-md-9">

                                            <div class="custom-file">
                                                <input type="file" name="file_kip" class="custom-file-input" id="site-kip">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>

                                    </div>
                                    <? if (isset($siswa['file_kip'])) { ?>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                                            <div class="col-sm-6 col-md-6">
                                                <img src="http://localhost:8000/assets/upload/kip/<?= $siswa['file_kip'] ?>" class="img-thumbnail" width="50%">
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                                    <button class="btn btn-secondary" type="button">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-berkas').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                iziToast.success({
                    title: 'Berhasil!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            }
        });
    });
</script>




<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-kk').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Berhasil! ',
                    message: 'Data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-akta').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Berhasil! ',
                    message: 'Data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-ijazah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Berhasil! ',
                    message: 'Data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-kip').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'mod_berkas/crud_berkas.php?pg=ubah',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Berhasil! ',
                    message: 'Data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>