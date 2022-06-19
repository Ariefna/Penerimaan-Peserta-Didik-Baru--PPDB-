-- drop database nas;
-- create database nas;
-- use nas;

--   FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
--   FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)




CREATE TABLE `setting` (
  `id_setting`int(11) NOT NULL AUTO_INCREMENT,
  `id_user`int NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL, --ok
  `nsm` varchar(30) NOT NULL, --ok
  `npsn` varchar(30) DEFAULT NULL, --ok
  `status` text NOT NULL, --ok
  `alamat` varchar(255) DEFAULT NULL, --ok
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL, --ok
  `logo` varchar(50) DEFAULT NULL, --ok
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL, --ok
  `infobayar` text DEFAULT NULL, --ok
  `kab` text NOT NULL, --ok
  `kec` text NOT NULL, --ok
  `web` text NOT NULL, --ok
  `kepala` text NOT NULL, --ok
  `nip` text NOT NULL, --ok
  `kop` varchar(50) NOT NULL, --ok
  `logo_sidadik` varchar(100) NOT NULL, --ok
  PRIMARY KEY (id_setting),
  CONSTRAINT FK_User FOREIGN KEY (id_user)
  REFERENCES user(id_user)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `user` (
  `id_user`int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE wilayah (
  `kode` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (kode)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE siswa (
  `id_siswa` int NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `warga_siswa` varchar(50) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `cita` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL, --ok
  `hobi` varchar(50) DEFAULT NULL,
  `status_tinggal_siswa` varchar(50) DEFAULT NULL,
  `prov` int NOT NULL,
  `kab` varchar(50) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL, --ok
  `kordinat` varchar(50) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(50) DEFAULT NULL,
  `jarak` varchar(50) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `biaya_sekolah` varchar(50) DEFAULT NULL,
  `keb_khusus` varchar(50) DEFAULT NULL,
  `keb_disabilitas` varchar(50) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(50) DEFAULT NULL,
  `no_kks` varchar(50) DEFAULT NULL,
  `no_pkh` varchar(50) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `status_ayah` varchar(50) DEFAULT NULL,
  `warga_ayah` varchar(50) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `no_hp_ayah` varchar(50) DEFAULT NULL,
  `domisili_ayah` varchar(50) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(50) DEFAULT NULL,
  `prov_ayah` int NOT NULL,
  `kab_ayah` varchar(50) DEFAULT NULL,
  `kec_ayah` varchar(50) DEFAULT NULL,
  `desa_ayah` varchar(50) DEFAULT NULL,
  `alamat_ayah` varchar(50) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `status_ibu` varchar(50) DEFAULT NULL,
  `warga_ibu` varchar(50) DEFAULT NULL,
  `nik_ibu` varchar(50) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `no_hp_ibu` varchar(50) DEFAULT NULL,
  `status_tinggal_ibu` varchar(50) DEFAULT NULL,
  `domisili_ibu` varchar(128) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(50) DEFAULT NULL,
  `prov_ibu` int NOT NULL,
  `kab_ibu` varchar(50) DEFAULT NULL,
  `kec_ibu` varchar(50) DEFAULT NULL,
  `desa_ibu` varchar(50) DEFAULT NULL,
  `alamat_ibu` varchar(50) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `warga_wali` varchar(50) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(50) DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(50) DEFAULT NULL,
  `prov_wali` int NOT NULL,
  `kab_wali` varchar(50) DEFAULT NULL,
  `kec_wali` varchar(50) DEFAULT NULL,
  `desa_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `kodepos_wali` varchar(50) DEFAULT NULL,
  `foto` varchar(128) NOT NULL,
  `file_kip` varchar(50) DEFAULT NULL,
  `file_kk` varchar(50) DEFAULT NULL,
  `file_pembayaran` varchar(50) DEFAULT NULL,
  `status_pay` int(1) DEFAULT 0,
  `file_ijazah` varchar(50) DEFAULT NULL,
  `file_akte` varchar(50) DEFAULT NULL,
  `file_shun` varchar(50) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
    PRIMARY KEY (id_siswa),
    CONSTRAINT FK_Wilayah1 FOREIGN KEY (prov)
    REFERENCES wilayah(kode),
    CONSTRAINT FK_Wilayah2 FOREIGN KEY (prov_ayah)
    REFERENCES wilayah(kode),
    CONSTRAINT FK_Wilayah3 FOREIGN KEY (prov_ibu)
    REFERENCES wilayah(kode),
    CONSTRAINT FK_Wilayah4 FOREIGN KEY (prov_wali)
    REFERENCES wilayah(kode)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `wilayah`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;