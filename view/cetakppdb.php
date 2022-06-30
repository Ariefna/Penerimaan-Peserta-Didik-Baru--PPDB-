<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cetak PPDB</h4>
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
                                                <?php if ($siswa['status_pay'] == 0) { ?>
                                                    <span class="badge badge-warning">menunggu</span>
                                                <?php } elseif ($siswa['status_pay'] == 1) { ?>
                                                    <span class="badge badge-success">Diterima </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Ditolak</span>
                                                <?php } ?>
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