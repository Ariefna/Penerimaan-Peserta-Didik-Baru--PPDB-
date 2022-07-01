<?php $siswa = fetch($koneksi, 'siswa', ['id_siswa' => $_SESSION['id_user']]); ?>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php if ($_SESSION['level'] == 'peserta' && $siswa['status_pay'] == 2) { ?>
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
                        <h4>Bukti Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-berkas">

                            <input type="hidden" name="id_siswa" value="<?= $_SESSION['id_user'] ?>">
                            <div class="card" id="berkas-card">
                                <div class="card-body">
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Bukti Transfer</label>
                                        <div class="col-sm-6 col-md-9">

                                            <div class="custom-file">
                                                <input type="file" name="file_pembayaran" class="custom-file-input" id="site-file_pembayaran">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                                        <div class="col-sm-6 col-md-6">
                                            <img src="http://localhost:8000/assets/upload/pay/<?= $siswa['file_pembayaran'] ?>" class="img-thumbnail" width="50%">
                                        </div>
                                    </div>
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
    // $('.custom-file-input').on('change', function() {
    //     let fileName = $(this).val().split('\\').pop();
    //     $(this).next('.custom-file-label').addClass("selected").html(fileName);
    // });
    $('#form-berkas').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_berkas/crud_berkas.php?pg=bayar',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
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