<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Verifikasi Pendaftaran</h4>
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
                                        <th>Jalur</th>
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
                                        if ($siswa['alumni'] == 1) {
                                            $alumni = "Umum";
                                        } else if ($siswa['alumni'] == 2) {
                                            $alumni = "Alumni";
                                        } else if ($siswa['alumni'] == 3) {
                                            $alumni = "Prestasi";
                                        }
                                        if ($siswa['tempat_lahir'] != '') {
                                            $tempat_lahir = $siswa['tempat_lahir'] . ", " . $siswa['tgl_lahir'];
                                        }
                                        $pendaftaran = "";
                                        if ($alumni != "Alumni") {
                                            $pendaftaran = '<a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?page=master_peserta_edit&id=' . enkripsi($siswa['id_siswa']) . '" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>';
                                        }
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $siswa['nisn'] ?></td>
                                            <td><?= $alumni ?></td>
                                            <td><?= $siswa['nama_siswa'] ?></td>
                                            <td><?= $siswa['jk'] ?></td>
                                            <td><?= $tempat_lahir ?></td>

                                            <td>
                                                <?php if ($siswa['status'] == 1) { ?>
                                                    <span class="badge badge-warning">menunggu</span>
                                                <?php } elseif ($siswa['status'] == 2) { ?>
                                                    <span class="badge badge-success">Diterima </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Ditolak</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?= $pendaftaran ?>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form id="form-edit<?= $no ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Status Pendaftaran</h5>
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
                                                                                <input type="radio" name="status" value="2" class="custom-switch-input" checked>
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">Diterima</span>
                                                                            </label>
                                                                            <label class="custom-switch">
                                                                                <input type="radio" name="status" value="3" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">Ditolak</span>
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
</section>