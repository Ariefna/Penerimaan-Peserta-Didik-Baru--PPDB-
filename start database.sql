CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `nsm` varchar(30) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `status` text NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `kab` text NOT NULL,
  `kec` text NOT NULL,
  `web` text NOT NULL,
  `kepala` text NOT NULL,
  `nip` text NOT NULL,
  `sidadik` text DEFAULT NULL,
  `kop` varchar(50) NOT NULL,
  `logo_sidadik` varchar(100) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `tgl_tutup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `kelas` varchar(256) DEFAULT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(256) DEFAULT NULL,
  `warga_siswa` varchar(256) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(256) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(256) DEFAULT NULL,
  `cita` varchar(256) DEFAULT NULL,
  `no_hp` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `hobi` varchar(256) DEFAULT NULL,
  `status_tinggal_siswa` varchar(256) DEFAULT NULL,
  `prov` varchar(256) DEFAULT NULL,
  `kab` varchar(256) DEFAULT NULL,
  `kec` varchar(256) DEFAULT NULL,
  `desa` varchar(256) DEFAULT NULL,
  `alamat_siswa` varchar(256) DEFAULT NULL,
  `kordinat` varchar(256) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(256) DEFAULT NULL,
  `jarak` varchar(256) DEFAULT NULL,
  `waktu` varchar(256) DEFAULT NULL,
  `biaya_sekolah` varchar(256) DEFAULT NULL,
  `keb_khusus` varchar(256) DEFAULT NULL,
  `keb_disabilitas` varchar(256) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(256) DEFAULT NULL,
  `no_kks` varchar(256) DEFAULT NULL,
  `no_pkh` varchar(256) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(256) DEFAULT NULL,
  `nama_ayah` varchar(256) DEFAULT NULL,
  `status_ayah` varchar(256) DEFAULT NULL,
  `warga_ayah` varchar(256) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(256) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(256) DEFAULT NULL,
  `pekerjaan_ayah` varchar(256) DEFAULT NULL,
  `penghasilan_ayah` varchar(256) DEFAULT NULL,
  `no_hp_ayah` varchar(256) DEFAULT NULL,
  `domisili_ayah` varchar(256) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(256) DEFAULT NULL,
  `prov_ayah` varchar(256) DEFAULT NULL,
  `kab_ayah` varchar(256) DEFAULT NULL,
  `kec_ayah` varchar(256) DEFAULT NULL,
  `desa_ayah` varchar(256) DEFAULT NULL,
  `alamat_ayah` varchar(256) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(256) DEFAULT NULL,
  `status_ibu` varchar(256) DEFAULT NULL,
  `warga_ibu` varchar(256) DEFAULT NULL,
  `nik_ibu` varchar(256) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(256) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(256) DEFAULT NULL,
  `pekerjaan_ibu` varchar(256) DEFAULT NULL,
  `penghasilan_ibu` varchar(256) DEFAULT NULL,
  `no_hp_ibu` varchar(256) DEFAULT NULL,
  `status_tinggal_ibu` varchar(256) DEFAULT NULL,
  `domisili_ibu` varchar(128) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(256) DEFAULT NULL,
  `prov_ibu` varchar(256) DEFAULT NULL,
  `kab_ibu` varchar(256) DEFAULT NULL,
  `kec_ibu` varchar(256) DEFAULT NULL,
  `desa_ibu` varchar(256) DEFAULT NULL,
  `alamat_ibu` varchar(256) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(256) DEFAULT NULL,
  `nama_wali` varchar(256) DEFAULT NULL,
  `warga_wali` varchar(256) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(256) DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(256) DEFAULT NULL,
  `pekerjaan_wali` varchar(256) DEFAULT NULL,
  `penghasilan_wali` varchar(256) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(256) DEFAULT NULL,
  `prov_wali` varchar(256) DEFAULT NULL,
  `kab_wali` varchar(256) DEFAULT NULL,
  `kec_wali` varchar(256) DEFAULT NULL,
  `desa_wali` varchar(256) DEFAULT NULL,
  `alamat_wali` varchar(256) DEFAULT NULL,
  `kodepos_wali` varchar(256) DEFAULT NULL,
  `foto` varchar(128) NOT NULL,
  `jurusan` varchar(256) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_pembayaran` varchar(256) DEFAULT NULL,
  `status_pay` int(1) DEFAULT 0,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `wilayah` (
  `kode` varchar(13) NOT NULL,
  `nama` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wilayah_2020` (
  `kode` varchar(13) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `wilayah_level_1_2` (
  `kode` varchar(13) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ibukota` varchar(100) DEFAULT NULL,
  `lat` double DEFAULT NULL COMMENT 'latitude in degrees',
  `lng` double DEFAULT NULL COMMENT 'longitude in degrees',
  `elv` float NOT NULL DEFAULT 0 COMMENT 'elevation in meters',
  `tz` tinyint(4) DEFAULT NULL COMMENT 'timezone in hour',
  `path` longtext DEFAULT NULL COMMENT 'boundaries/polygon area',
  `status` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Indeks untuk tabel `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `wilayah_level_1_2`
--
ALTER TABLE `wilayah_level_1_2`
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--
--
-- AUTO_INCREMENT untuk tabel `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;