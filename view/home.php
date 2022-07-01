<style>
    .align-items-center .col-md-9 {
        padding-bottom: 9px;
    }

    #myTabContent5 {
        padding-top: 40px;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class='row'>
            <div class="col-lg-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?= rowcount($koneksi, 'siswa', ['status' => 1]) ?></h3>
                        <p>Jumlah Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="?page=master_peserta" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= mysqli_num_rows(mysqli_query($koneksi, "select * from siswa where jk = 'L'")) ?></h3>
                        <p>Laki-laki</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-mars"></i>
                    </div>
                    <a href="?page=master_peserta" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= mysqli_num_rows(mysqli_query($koneksi, "select * from siswa where jk = 'P'")) ?></h3>
                        <p>Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-venus"></i>
                    </div>
                    <a href="?page=master_peserta" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?= $setting['status_pendaftaran'] == 0 ? "Tidak Aktif" : "Aktif" ?></h3>
                        <p>Status Pendaftaran</p>
                    </div>
                    <div class="icon">
                        <!-- <i class="fa fa-users"></i> -->
                    </div>
                    <a href="?ganti_mode=<?= $setting['status_pendaftaran'] == 0 ? "1" : "0" ?>" class="small-box-footer">Ganti Mode <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="alert alert-info alert-has-icon">
                        <div class="alert-icon"><i class=""></i></div>
                        <div class="alert-body">
                            <div class="alert-body">Data Sekolah </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="fas fa-home"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="fas fa-id-card"></i> Alamat Sekolah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="fas fa-mail-bulk"></i> Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kepala-tab5" data-toggle="tab" href="#kepala5" role="tab" aria-controls="kepala" aria-selected="false">
                                    <i class="fas fa-user"></i> Kepala Sekolah</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane fade show active" id="home5" role="tabpanel" aria-labelledby="home-tab5">
                                <form id="form-setting1">
                                    <div class="card" id="settings-card">

                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">NSM</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['nsm'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">NPSN </label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['npsn'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Nama Sekolah</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['nama_sekolah'] ?>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="site-description" class="form-control-label col-sm-2 text-md-right">Status Sekolah</label>
                                            <div class="col-sm-7 col-md-9">

                                                <?= $setting['status'] ?>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                                <form id="form-setting2">
                                    <div class="card" id="settings-card">

                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Alamat Lengkap</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['alamat'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Provinsi </label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['provinsi'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Kabupaten</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['kab'] ?>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="site-description" class="form-control-label col-sm-2 text-md-right">Kecamatan</label>
                                            <div class="col-sm-7 col-md-9">

                                                <?= $setting['kec'] ?>

                                            </div>
                                        </div>

                                    </div>


                                </form>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
                                <form id="form-setting3">
                                    <div class="card" id="settings-card">

                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">No Telpon</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['no_telp'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Email </label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['email'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Website</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['web'] ?>
                                            </div>
                                        </div>



                                    </div>

                                </form>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="kepala5" role="tabpanel" aria-labelledby="kepala-tab5">
                                <form id="form-setting3">
                                    <div class="card" id="settings-card">

                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Kepala Sekolah</label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['kepala'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-2 text-md-right">Nip </label>
                                            <div class="col-sm-7 col-md-9">
                                                <?= $setting['nip'] ?>
                                            </div>
                                        </div>




                                    </div>

                                </form>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="alert alert-info alert-has-icon">
                        <div class="alert-icon"><i class=""></i></div>
                        <div class="alert-body">
                            <div class="alert-body">Data Peserta Berdasarkan Asal Sekolah </div>

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
                                        <th>Asal Sekolah</th>
                                        <th>Kota</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select nama_sekolah, kota_sekolah, count(*) jumlah from siswa group by nama_sekolah order by 3");
                                    $no = 0;
                                    while ($siswa = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $siswa['nama_sekolah'] == '' ? 'Kosong' : $siswa['nama_sekolah'] ?></td>
                                            <td><?= $siswa['kota_sekolah'] == '' ? 'Kosong' : $siswa['kota_sekolah'] ?></td>
                                            <td><?= $siswa['jumlah'] ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
</section>
<!-- /.content -->