<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cetak Peserta Didik Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Hp</th>
                                        <th>Asal Sekolah</th>
                                        <th>Tanggal Pengisian Formulir</th>
                                        <th>Pembayaran</th>
                                        <th>No Formulir</th>
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
                                            <td><?= $siswa['nama_siswa'] ?></td>
                                            <td><?= $siswa['alamat_siswa'] ?></td>
                                            <td><?= $siswa['no_hp'] ?></td>
                                            <td><?= $siswa['nama_sekolah'] ?></td>
                                            <td><?= $siswa['tgl_siswa'] ?></td>
                                            <td><?= $siswa['status_pay'] == 1 ? "lunas" : "belum lunas" ?></td>
                                            <td><?= $siswa['id_siswa'] ?></td>
                                        </tr>
                                        <script>
                                            $(function() {
                                                $("#example1").DataTable({
                                                    "responsive": true,
                                                    "lengthChange": false,
                                                    "autoWidth": false,
                                                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                                // $('#example2').DataTable({
                                                //     "paging": true,
                                                //     "lengthChange": false,
                                                //     "searching": false,
                                                //     "ordering": true,
                                                //     "info": true,
                                                //     "autoWidth": false,
                                                //     "responsive": true,
                                                // });
                                            });
                                            // $('#table-1').on('click', '.hapus', function() {
                                            //     var id = $(this).data('id');
                                            //     swal.fire({
                                            //         title: 'Are you sure?',
                                            //         text: "Akan menghapus data ini!",
                                            //         icon: 'warning',
                                            //         showCancelButton: true,
                                            //         confirmButtonColor: '#3085d6',
                                            //         cancelButtonColor: '#d33',
                                            //         confirmButtonText: 'Yes, delete it!'
                                            //     }).then((result) => {
                                            //         if (result) {
                                            //             $.ajax({
                                            //                 url: 'model/json/admin/mod_siswa/crud_siswa.php?pg=hapus',
                                            //                 method: "POST",
                                            //                 data: 'id_siswa=' + id,
                                            //                 success: function(data) {
                                            //                     iziToast.success({
                                            //                         title: 'Yups . . .',
                                            //                         message: 'Data Siswa Berhasil dihapus',
                                            //                         position: 'topRight'
                                            //                     });
                                            //                     setTimeout(function() {
                                            //                         window.location.reload();
                                            //                     }, 2000);
                                            //                 }
                                            //             });
                                            //         }
                                            //     })

                                            // });
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