<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Siswa</h4>

                        <div class="card-header-action">
                            <!-- <a class="btn btn-info" href="mod_siswa/export_excel.php" role="button"> Export Data</a> -->
                            <!-- <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#tambahdata">
                                <i class="far fa-edit"></i> Tambah Data
                            </button> -->
                            <!-- <button type="button" class="btn btn-primary m-b-5" data-toggle="modal" data-target="#importdata"><i class="sidebar-item-icon fa fa-upload"></i>
                                Import Data
                            </button>&nbsp; -->
                            <!-- <button type="button" class="btn btn-icon icon-left btn-danger" data-toggle="modal" data-target="#hapusdata">
                                <i class="fa fa-trash"></i> Hapus Data
                            </button> -->

                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="font-size: 16px" class="table table-bordered table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>NISN</th>
                                        <th>Kata Sandi</th>
                                        <th>Nama Siswa</th>
                                        <th>L/P</th>
                                        <th>TTL</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from siswa order by status");
                                    $no = 0;
                                    while ($siswa = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $siswa['nisn'] ?></td>
                                            <td><?= $siswa['password'] ?></td>
                                            <td><?= $siswa['nama_siswa'] ?></td>
                                            <td><?= $siswa['jk'] ?></td>
                                            <td><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>

                                            <td>
                                                <?php if ($siswa['status'] == 1) { ?>
                                                    <span class="badge badge-secondary">Baru Daftar</span>
                                                <?php } elseif ($siswa['status'] == 2) { ?>
                                                    <span class="badge badge-success">Lolos tahap 1</span>
                                                <?php } elseif ($siswa['status'] == 3) { ?>
                                                    <span class="badge badge-warning">Tidak Lolos tahap 1</span>
                                                <?php } elseif ($siswa['status'] == 4) { ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php } elseif ($siswa['status'] == 5) { ?>
                                                    <span class="badge badge-danger">Mutasi </span>
                                                <?php } elseif ($siswa['status'] == 6) { ?>
                                                    <span class="badge badge-warning">DO/Keluar</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?page=master_peserta_edit&id=<?= enkripsi($siswa['id_siswa']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye    "></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                    <i class="fas fa-user    "></i>
                                                </button>
                                                <!-- <button data-id="<?= $siswa['id_siswa'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button> -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form id="form-edit<?= $no ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Status Siswa</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">

                                                                    <div class="form-group">
                                                                        <div class="control-label">Pilih Status</div>
                                                                        <div class="custom-switches-stacked mt-2">
                                                                            <label class="custom-switch">
                                                                                <input type="radio" name="status" value="3" class="custom-switch-input" checked>
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">Aktif</span>
                                                                            </label>
                                                                            <label class="custom-switch">
                                                                                <input type="radio" name="status" value="4" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">Mutasi</span>
                                                                            </label>
                                                                            <label class="custom-switch">
                                                                                <input type="radio" name="status" value="5" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">DO/Putus Sekolah</span>
                                                                            </label>


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
                                            </td>
                                        </tr>
                                        <script>
                                            $('#table-1').on('click', '.hapus', function() {
                                                var id = $(this).data('id');
                                                swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "Akan menghapus data ini!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result) {
                                                        $.ajax({
                                                            url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=hapus',
                                                            method: "POST",
                                                            data: 'id_siswa=' + id,
                                                            success: function(data) {
                                                                iziToast.success({
                                                                    title: 'Yups . . .',
                                                                    message: 'Data Siswa Berhasil dihapus',
                                                                    position: 'topRight'
                                                                });
                                                                setTimeout(function() {
                                                                    window.location.reload();
                                                                }, 2000);
                                                            }
                                                        });
                                                    }
                                                })

                                            });
                                            $('#form-edit<?= $no ?>').submit(function(e) {
                                                e.preventDefault();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=status',
                                                    data: $(this).serialize(),
                                                    success: function(data) {

                                                        iziToast.success({
                                                            title: 'berhasil',
                                                            message: 'Status Berhasil diubah',
                                                            position: 'topRight'
                                                        });
                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
                                                        $('#modal-edit<?= $no ?>').modal('hide');
                                                        //$('#bodyreset').load(location.href + ' #bodyreset');
                                                    }
                                                });
                                                return false;
                                            });
                                        </script>
                                    <?php }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control nisn" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama" class="form-control" required="">
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
<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-konfirmasi">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Terdapat <b><?= rowcount($koneksi, 'siswa') ?></b> Jumlah data Siswa Akan Di Hapus.


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus Semua</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-import">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Import File Excel</label>
                        <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                        <small id="helpfile" class="form-text text-muted">File harus .xls</small>
                    </div>

                    <p><a href="template_excel/importsiswa.xls">Download Format</a></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
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

                iziToast.success({
                    title: '<?= $_SESSION['nama']; ?> . . .',
                    message: 'data siswa berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
    $('#form-konfirmasi').submit(function(e) {
        e.preventDefault();
        swal.fire({
            title: 'Are you sure?',
            text: "Akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=konfirmasi',
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        iziToast.success({
                            title: 'Terimakasih!',
                            message: 'Data Berhasil di Hapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        })

    });
</script>