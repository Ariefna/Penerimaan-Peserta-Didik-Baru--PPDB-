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
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="font-weight-bold text-primary">Data Siswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="author-box-details">
                            <div class="row">
                                <div class="col-12 col-sm-5 col-lg">
                                    <div class="card">

                                        <div class="card-header container-fluid">
                                            <h3 class="w-75 p-3">Form Siswa | Status <?php if ($siswa['status'] == 1) { ?>
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
                                            </h3>
                                        </div>

                                        <div class="card-body">
                                            <ul class="nav nav-pills nav-fill" id="myTab3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="data-diri" data-toggle="tab" href="#datadiri" role="tab" aria-controls="diri" aria-selected="true">Data Diri</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="data-ayah" data-toggle="tab" href="#dataayah" role="tab" aria-controls="ayah" aria-selected="false">Data Ayah</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="data-ibu" data-toggle="tab" href="#dataibu" role="tab" aria-controls="ibu" aria-selected="false">Data Ibu</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="data-wali" data-toggle="tab" href="#datawali" role="tab" aria-controls="wali" aria-selected="false">Data Wali</a>
                                                </li>
                                            </ul>
                                            <div class="card-body">

                                                <div class="tab-content" id="myTabContent2">

                                                    <!-- DATA DIRI -->
                                                    <div class="tab-pane fade show active" id="datadiri" role="tabpanel" aria-labelledby="data-diri">
                                                        <form id="form-datadiri">
                                                            <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Nama Lengkap</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required="required" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kewarganegaraan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='warga_siswa' required>
                                                                            <option value=''>Pilih Kewarganegaraan</option>";
                                                                            <?php foreach ($kewarganegaraan as $val) { ?>
                                                                                <?php if ($siswa['warga_siswa'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>NISN</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="10" minlength="10" type="text" name="nisn" value="<?= $siswa['nisn'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>NIS Lokal</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" type="text" name="nis" value="<?= $siswa['nis'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>NIK</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik" value="<?= $siswa['nik'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tempat Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tanggal Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="date" name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>" required="required" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="text-info"><strong>Jenis Kelamin</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="customRadioInline1" name="jk" class="custom-control-input" value="L" <?php if ($siswa['jk'] == 'L') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="customRadioInline2" name="jk" class="custom-control-input" value="P" <?php if ($siswa['jk'] == 'P') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Anak Ke</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="anak_ke" value="<?= $siswa['anak_ke'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Jml Saudara</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="saudara" value="<?= $siswa['saudara'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Agama</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='agama' required>
                                                                            <option value=''>Pilih Agama</option>";
                                                                            <?php foreach ($agama as $val) { ?>
                                                                                <?php if ($siswa['agama'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Cita-cita</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='cita' required>
                                                                            <option value=''>Pilih Cita-cita</option>";
                                                                            <?php foreach ($cita as $val) { ?>
                                                                                <?php if ($siswa['cita'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No Hp</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp" value="<?= $siswa['no_hp'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Email</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="email" name="email" value="<?= $siswa['email'] ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Hobi</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='hobi' required>
                                                                            <option value=''>Pilih hobi</option>";
                                                                            <?php foreach ($hobi as $val) { ?>
                                                                                <?php if ($siswa['hobi'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div><br>
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Status Tempat Tinggal</strong></div>
                                                                    <select class='form-control' name='status_tinggal_siswa' required>
                                                                        <option value=''>Pilih status tinggal</option>";
                                                                        <?php foreach ($status_tinggal_siswa as $val) { ?>
                                                                            <?php if ($siswa['status_tinggal_siswa'] == $val) { ?>
                                                                                <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                            <?php  } else { ?>
                                                                                <option value='<?= $val ?>'><?= $val ?> </option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Provinsi</b></i>
                                                                            </div>
                                                                        </div>

                                                                        <input class="form-control" name="prov" type="text" value="<?= $siswa['prov'] ?>" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kabupaten</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kab" value="<?= $siswa['kab'] ?>" required />
                                                                        <!--<select class='form-control' id="form_kab" name='kab' required>
                                                                        <option value="<?= $siswa['kab'] ?>"><?= $siswa['kab'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kecamatan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kec" value="<?= $siswa['kec'] ?>" required />
                                                                        <!--<select class='form-control' id="form_kec" name='kec' required>
                                                                        <option value="<?= $siswa['kec'] ?>"><?= $siswa['kec'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Desa</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="desa" value="<?= $siswa['desa'] ?>" required />
                                                                        <!--<select class='form-control' id="form_des" name='desa' required>
                                                                        <option value="<?= $siswa['desa'] ?>"><?= $siswa['desa'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Nama Jalan / Dusun</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="alamat_siswa" value="<?= $siswa['alamat_siswa'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kordinat Rumah</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kordinat" value="<?= $siswa['kordinat'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kode Pos</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="6" minlength="6" type="text" name="kodepos_siswa" value="<?= $siswa['kodepos_siswa'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Alat transportasi</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='transportasi' required>
                                                                            <option value=''>Pilih transportasi</option>";
                                                                            <?php foreach ($transportasi as $val) { ?>
                                                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Jarak Rumah-Sekolah</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='jarak' required>
                                                                            <option value=''>Pilih jarak</option>";
                                                                            <?php foreach ($jarak as $val) { ?>
                                                                                <?php if ($siswa['jarak'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Waktu tempuh</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='waktu' required>
                                                                            <option value=''>Pilih waktu</option>";
                                                                            <?php foreach ($waktu as $val) { ?>
                                                                                <?php if ($siswa['waktu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Yang membiayai sekolah</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='biaya_sekolah' required>
                                                                            <option value=''>Pilih biaya sekolah</option>";
                                                                            <?php foreach ($biaya_sekolah as $val) { ?>
                                                                                <?php if ($siswa['biaya_sekolah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kebutuhan Khusus</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='keb_khusus' required>
                                                                            <option value=''></option>";
                                                                            <?php foreach ($keb_khusus as $val) { ?>
                                                                                <?php if ($siswa['keb_khusus'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kebutuhan Disabilitas</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='keb_disabilitas' required>
                                                                            <option value=''></option>";
                                                                            <?php foreach ($keb_disabilitas as $val) { ?>
                                                                                <?php if ($siswa['keb_disabilitas'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>PRA SEKOLAH</strong></div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="tk" name="tk" value="Y" <?php if ($siswa['tk'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="tk">Pernah TK/RA</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="paud" name="paud" value="Y" <?php if ($siswa['paud'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="paud">Pernah PAUD</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>IMUNISASI</strong></div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="hepatitis" name="hepatitis" value="Y" <?php if ($siswa['hepatitis'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="hepatitis">Hepatitis B</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="polio" name="polio" value="Y" <?php if ($siswa['polio'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="polio">Polio</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="bcg" name="bcg" value="Y" <?php if ($siswa['bcg'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="bcg">BCG</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="campak" name="campak" value="Y" <?php if ($siswa['campak'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="campak">Campak</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="dpt" name="dpt" value="Y" <?php if ($siswa['dpt'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="dpt">DPT</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline col-md-4">
                                                                        <input class="form-check-input" type="checkbox" id="covid" name="covid" value="Y" <?php if ($siswa['covid'] == 'Y') echo 'checked' ?>>
                                                                        <label class="form-check-label" for="covid">Covid</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No KIP</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="no_kip" value="<?= $siswa['no_kip'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No KKS</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="no_kks" value="<?= $siswa['no_kks'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No PKH</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="no_pkh" value="<?= $siswa['no_pkh'] ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No. KK</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" name="no_kk" value="<?= $siswa['no_kk'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Nama Kepala Keluarga</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kepala_keluarga" value="<?= $siswa['kepala_keluarga'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- DATA AYAH -->
                                                    <div class="tab-pane fade" id="dataayah" role="tabpanel" aria-labelledby="data-ayah">
                                                        <form id="form-dataayah">
                                                            <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Nama</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Status Ayah</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="status_ayah" name="status_ayah" class="custom-control-input" value="Masih Hidup" <?php if ($siswa['status_ayah'] == 'Masih Hidup') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="status_ayah">Masih Hidup</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="meninggal" name="status_ayah" class="custom-control-input" value="Sudah Meninggal" <?php if ($siswa['status_ayah'] == 'Sudah Meninggal') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="meninggal">Sudah Meninggal</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="tidak_diketahui" name="status_ayah" class="custom-control-input" value="Tidak Diketahui" <?php if ($siswa['status_ayah'] == 'Tidak Diketahui') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="tidak_diketahui">Tidak Diketahui</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kewarganegaraan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='warga_ayah' required>
                                                                            <option value=''>Pilih Kewarganegaraan</option>";
                                                                            <?php foreach ($kewarganegaraan as $val) { ?>
                                                                                <?php if ($siswa['warga_ayah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>NIK</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik_ayah" value="<?= $siswa['nik_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tempat Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="tempat_lahir_ayah" value="<?= $siswa['tempat_lahir_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tanggal Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="date" name="tgl_lahir_ayah" value="<?= $siswa['tgl_lahir_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pendidikan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pendidikan_ayah' required>
                                                                            <option value=''>Pilih Pendidikan</option>";
                                                                            <?php foreach ($pendidikan as $val) { ?>
                                                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pekerjaan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pekerjaan_ayah' required>
                                                                            <option value=''>Pilih Pekerjaan</option>";
                                                                            <?php foreach ($pekerjaan as $val) { ?>
                                                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Penghasilan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='penghasilan_ayah' required>
                                                                            <option value=''>Pilih Penghasilan</option>";
                                                                            <?php foreach ($penghasilan as $val) { ?>
                                                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No Hp</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_ayah" value="<?= $siswa['no_hp_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Domisili Ayah</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="domisili_ayah" name="domisili_ayah" class="custom-control-input" value="Dalam Negeri" <?php if ($siswa['domisili_ayah'] == 'Dalam Negeri') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="domisili_ayah">Dalam Negeri</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="luar_negeri" name="domisili_ayah" class="custom-control-input" value="Luar Negeri" <?php if ($siswa['domisili_ayah'] == 'Luar Negeri') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="luar_negeri">Luar Negeri</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Status Tempat Tinggal</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='status_tmp_tinggal_ayah' required>
                                                                            <option value=''></option>";
                                                                            <?php foreach ($statustinggal as $val) { ?>
                                                                                <?php if ($siswa['status_tmp_tinggal_ayah'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Provinsi</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="prov_ayah" value="<?= $siswa['prov_ayah'] ?>" />
                                                                        <!--<select class='form-control' id="form_prov_ayah" name='prov_ayah' required>
                                                                        <option value=""><?= $siswa['prov_ayah'] ?></option>
                                                                        <?php
                                                                        $daerah = mysqli_query($koneksi, "SELECT kode,nama FROM wilayah WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                                                                        while ($d = mysqli_fetch_array($daerah)) {
                                                                        ?>
                                                                            <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kabupaten</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kab_ayah" value="<?= $siswa['kab_ayah'] ?>" />
                                                                        <!--<select class='form-control' id="form_kab_ayah" name='kab_ayah' required>
                                                                        <option value="<?= $siswa['kab_ayah'] ?>"><?= $siswa['kab_ayah'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kecamatan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kec_ayah" value="<?= $siswa['kec_ayah'] ?>" />
                                                                        <!--<select class='form-control' id="form_kec_ayah" name='kec_ayah' required>
                                                                        <option value="<?= $siswa['kec_ayah'] ?>"><?= $siswa['kec_ayah'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Desa</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="desa_ayah" value="<?= $siswa['desa_ayah'] ?>" />
                                                                        <!--<select class='form-control' id="form_des_ayah" name='desa_ayah' required>
                                                                        <option value="<?= $siswa['desa_ayah'] ?>"><?= $siswa['desa_ayah'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Nama Jalan / Dusun</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="alamat_ayah" value="<?= $siswa['alamat_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Kodepos</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kodepos_ayah" value="<?= $siswa['kodepos_ayah'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- DATA IBU -->
                                                    <div class="tab-pane fade" id="dataibu" role="tabpanel" aria-labelledby="data-ibu">
                                                        <form id="form-dataibu">
                                                            <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Nama</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Status ibu</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="status_ibu" name="status_ibu" class="custom-control-input" value="Masih Hidup" <?php if ($siswa['status_ibu'] == 'Masih Hidup') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="status_ibu">Masih Hidup</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="meninggal_ibu" name="status_ibu" class="custom-control-input" value="Sudah Meninggal" <?php if ($siswa['status_ibu'] == 'Sudah Meninggal') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="meninggal_ibu">Sudah Meninggal</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="tidak_diketahui_ibu" name="status_ibu" class="custom-control-input" value="Tidak Diketahui" <?php if ($siswa['status_ibu'] == 'Tidak Diketahui') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="tidak_diketahui_ibu">Tidak Diketahui</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kewarganegaraan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='warga_ibu' required>
                                                                            <option value=''>Pilih Kewarganegaraan</option>";
                                                                            <?php foreach ($kewarganegaraan as $val) { ?>
                                                                                <?php if ($siswa['warga_ibu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>NIK</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik_ibu" value="<?= $siswa['nik_ibu'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tempat Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="tempat_lahir_ibu" value="<?= $siswa['tempat_lahir_ibu'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tanggal Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="date" name="tgl_lahir_ibu" value="<?= $siswa['tgl_lahir_ibu'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pendidikan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pendidikan_ibu' required>
                                                                            <option value=''>Pilih Pendidikan</option>";
                                                                            <?php foreach ($pendidikan as $val) { ?>
                                                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pekerjaan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pekerjaan_ibu' required>
                                                                            <option value=''>Pilih Pekerjaan</option>";
                                                                            <?php foreach ($pekerjaan as $val) { ?>
                                                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Penghasilan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='penghasilan_ibu' required>
                                                                            <option value=''>Pilih Penghasilan</option>";
                                                                            <?php foreach ($penghasilan as $val) { ?>
                                                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No Hp</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_ibu" value="<?= $siswa['no_hp_ibu'] ?>" required="required" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Status Tinggal Ibu</strong></div>
                                                                    <select class="form-control" name="status_tinggal_ibu" value="<?= $siswa['status_tinggal_ibu'] ?>">
                                                                        <option value=""><?= $siswa['status_tinggal_ibu'] ?></option>
                                                                        <option value="Sama Dengan Ayah">Sama Dengan Ayah</option>
                                                                        <option value="Beda Dengan Ayah">Beda Dengan Ayah</option>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Domisili ibu</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="domisili_ibu" name="domisili_ibu" class="custom-control-input" value="Dalam Negeri" <?php if ($siswa['domisili_ibu'] == 'Dalam Negeri') echo 'checked' ?> readonly>
                                                                        <label class="custom-control-label" for="domisili_ibu">Dalam Negeri</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="luar_negeri_ibu" name="domisili_ibu" class="custom-control-input" value="Luar Negeri" <?php if ($siswa['domisili_ibu'] == 'Luar Negeri') echo 'checked' ?> readonly>
                                                                        <label class="custom-control-label" for="luar_negeri_ibu">Luar Negeri</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Status Tempat Tinggal</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='status_tmp_tinggal_ibu' readonly>
                                                                            <option value=''></option>";
                                                                            <?php foreach ($statustinggal as $val) { ?>
                                                                                <?php if ($siswa['status_tmp_tinggal_ibu'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Provinsi</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" hidden type="text" name="prov_ibu" value="<?= $siswa['prov_ibu'] ?>" readonly />
                                                                        <select class='form-control' id="form_prov_ibu" name='prov_ibu'>
                                                                            <option value=""><?= $siswa['prov_ibu'] ?></option>
                                                                            <?php
                                                                            $daerah = mysqli_query($koneksi, "SELECT kode,nama FROM wilayah WHERE kode=" . $siswa['prov_ibu'] . " ORDER BY nama");
                                                                            while ($d = mysqli_fetch_array($daerah)) {
                                                                            ?>
                                                                                <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kabupaten</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kab_ibu" value="<?= $siswa['kab_ibu'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_kab_ibu" name='kab_ibu' readonly>
                                                                        <option value="<?= $siswa['kab_ibu'] ?>"><?= $siswa['kab_ibu'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kecamatan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kec_ibu" value="<?= $siswa['kec_ibu'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_kec_ibu" name='kec_ibu' readonly>
                                                                        <option value="<?= $siswa['kec_ibu'] ?>"><?= $siswa['kec_ibu'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Desa</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="desa_ibu" value="<?= $siswa['desa_ibu'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_des_ibu" name='desa_ibu' readonly>
                                                                        <option value="<?= $siswa['desa_ibu'] ?>"><?= $siswa['desa_ibu'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Nama Jalan / Dusun</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="alamat_ibu" value="<?= $siswa['alamat_ibu'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Kodepos</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kodepos_ibu" value="<?= $siswa['kodepos_ibu'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!-- DATA WALI -->
                                                    <div class="tab-pane fade" id="datawali" role="tabpanel" aria-labelledby="data-wali">
                                                        <form id="form-datawali">
                                                            <input type="hidden" value="<?= $siswa['id_siswa'] ?>" name="id_siswa" class="form-control" required="">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Status wali</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="status_wali" name="status_wali" class="custom-control-input" value="Sama Dengan Ayah" <?php if ($siswa['status_wali'] == 'Sama Dengan Ayah') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="status_wali">Sama Dengan Ayah</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="Sama Dengan Ibu_wali" name="status_wali" class="custom-control-input" value="Sama Dengan Ibu" <?php if ($siswa['status_wali'] == 'Sama Dengan Ibu') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="Sama Dengan Ibu_wali">Sama Dengan Ibu</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="Lainnya_wali" name="status_wali" class="custom-control-input" value="Lainnya" <?php if ($siswa['status_wali'] == 'Lainnya') echo 'checked' ?>>
                                                                        <label class="custom-control-label" for="Lainnya_wali">Lainnya</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Nama</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="nama_wali" value="<?= $siswa['nama_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kewarganegaraan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='warga_wali' readonly>
                                                                            <option value=''>Pilih Kewarganegaraan</option>";
                                                                            <?php foreach ($kewarganegaraan as $val) { ?>
                                                                                <?php if ($siswa['warga_wali'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>NIK</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="16" minlength="16" type="text" name="nik_wali" value="<?= $siswa['nik_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tempat Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="tempat_lahir_wali" value="<?= $siswa['tempat_lahir_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Tanggal Lahir</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="date" name="tgl_lahir_wali" value="<?= $siswa['tgl_lahir_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pendidikan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pendidikan_wali' readonly>
                                                                            <option value=''>Pilih Pendidikan</option>";
                                                                            <?php foreach ($pendidikan as $val) { ?>
                                                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Pekerjaan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='pekerjaan_wali' readonly>
                                                                            <option value=''>Pilih Pekerjaan</option>";
                                                                            <?php foreach ($pekerjaan as $val) { ?>
                                                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Penghasilan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class='form-control' name='penghasilan_wali' readonly>
                                                                            <option value=''>Pilih Penghasilan</option>";
                                                                            <?php foreach ($penghasilan as $val) { ?>
                                                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                                <?php  } else { ?>
                                                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>No Hp</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" onkeypress="return hanyaAngka(this);" maxlength="13" minlength="10" type="text" name="no_hp_wali" value="<?= $siswa['no_hp_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="text-info"><strong>Domisili wali</strong></div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="domisili_wali" name="domisili_wali" class="custom-control-input" value="Dalam Negeri" <?php if ($siswa['domisili_wali'] == 'Dalam Negeri') echo 'checked' ?> readonly>
                                                                        <label class="custom-control-label" for="domisili_wali">Dalam Negeri</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="luar_negeri_wali" name="domisili_wali" class="custom-control-input" value="Luar Negeri" <?php if ($siswa['domisili_wali'] == 'Luar Negeri') echo 'checked' ?> readonly>
                                                                        <label class="custom-control-label" for="luar_negeri_wali">Luar Negeri</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Provinsi</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="prov_wali" value="<?= $siswa['prov_wali'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_prov_wali" name='prov_wali' readonly>
                                                                        <option value=""><?= $siswa['prov_wali'] ?></option>
                                                                        <?php
                                                                        $daerah = mysqli_query($koneksi, "SELECT kode,nama FROM wilayah WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                                                                        while ($d = mysqli_fetch_array($daerah)) {
                                                                        ?>
                                                                            <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kabupaten</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kab_wali" value="<?= $siswa['kab_wali'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_kab_wali" name='kab_wali' readonly>
                                                                        <option value="<?= $siswa['kab_wali'] ?>"><?= $siswa['kab_wali'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Kecamatan</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kec_wali" value="<?= $siswa['kec_wali'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_kec_wali" name='kec_wali' readonly>
                                                                        <option value="<?= $siswa['kec_wali'] ?>"><?= $siswa['kec_wali'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="text-info"><b>Desa</b></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="desa_wali" value="<?= $siswa['desa_wali'] ?>" readonly />
                                                                        <!--<select class='form-control' id="form_des_wali" name='desa_wali' readonly>
                                                                        <option value="<?= $siswa['desa_wali'] ?>"><?= $siswa['desa_wali'] ?></option>
                                                                    </select>-->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Nama Jalan / Dusun</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="alamat_wali" value="<?= $siswa['alamat_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text ">
                                                                                <i class="text-info"><strong>Kodepos</strong></i>
                                                                            </div>
                                                                        </div>
                                                                        <input class="form-control" type="text" name="kodepos_wali" value="<?= $siswa['kodepos_wali'] ?>" readonly />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <button type="submit" id="btnsimpan" name="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>