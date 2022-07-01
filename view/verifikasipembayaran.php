<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Verifikasi Pembayaran</h4>
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
                                        <th>Password</th>
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
                                                <?php if ($siswa['status_pay'] == 1) { ?>
                                                    <span class="badge badge-warning">menunggu</span>
                                                <?php } elseif ($siswa['status_pay'] == 2) { ?>
                                                    <span class="badge badge-success">Diterima </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Ditolak</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <? if ($siswa['file_pembayaran'] == '') { ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="http://localhost:8000/assets/upload/pay/<?= $siswa['file_pembayaran'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <? } ?>
                                                <!-- <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?page=master_peserta_edit&id=<? //= enkripsi($siswa['id_siswa']) 
                                                                                                                                                                                    ?>" class="btn btn-sm btn-info"><i class="fas fa-eye    "></i></a> -->
                                                <!-- Button trigger modal -->
                                                <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-view<?= $no ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button> -->
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- <button data-id="<?= $siswa['id_siswa'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button> -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form id="form-edit<?= $no ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Status Pembayaran</h5>
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
                                                                                <input type="radio" name="status" value="1" class="custom-switch-input" checked>
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <span class="custom-switch-description">Diterima</span>
                                                                            </label>
                                                                            <label class="custom-switch">
                                                                                <input type="radio" name="status" value="2" class="custom-switch-input">
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
                                                    url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=status_pay',
                                                    data: $(this).serialize(),
                                                    success: function(data) {

                                                        iziToast.success({
                                                            title: 'OKee!',
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