<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Master Peserta</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Delivery Order</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Pengiriman</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT a.id_sj, kode_sj,kodepl, DATE_FORMAT(tanggal, '%d %M %Y') as tanggal, status, sum(qty) FROM table_sj_detail a join table_sj b on a.id_sj = b.id_sj join table_kodesj c on a.id_sj = c.id_sj group by kode_sj order by id_sj desc";
                                $result = mysqli_query($conn, $query);
                                $i = 1;
                                while ($rows = mysqli_fetch_array($result)) {
                                    echo '<tr>
											<td align="center">' . $i . '</td>
											<td align="center">' . $rows['kode_sj'] . '</td>
											<td align="center">' . $rows['kodepl'] . '</td>
											<td align="center">' . $rows['tanggal'] . '</td>
											<td align="center">' . $rows['sum(qty)'] . '</td>
											<td align="center">' . $sts . '</td>
											<td class="text-center"><a href="sj.php?kode_sj=' . $rows['kode_sj'] . '" class="btn btn-success btn-sm" target="_blank" style="margin-right:5px" ' . $btn . '>Print</a><a href="?page=createapprovesj&sj=' . $rows['id_sj'] . '" class="btn btn-warning btn-sm">Detail</a></td>
											</tr>';
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Delivery Order</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Pengiriman</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->