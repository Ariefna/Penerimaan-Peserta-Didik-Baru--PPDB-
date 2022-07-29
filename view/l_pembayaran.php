<?php
// defined('BASEPATH') or exit('No direct script access allowed');
// $siswa = $this->db->get('tbl_user')->row_array();
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => $_SESSION['id_user']]);
$setting = fetch($koneksi, 'setting', ['id_setting' => 1]);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $setting['nama_sekolah'] ?></title>
    <base href="http://localhost:8000/" />
    <link rel="icon" type="image/png" href="http://localhost:8000/<?= $setting['logo'] ?>" />
    <style>
        table {
            border-collapse: collapse;
        }

        thead>tr {
            background-color: #0070C0;
            color: #f1f1f1;
        }

        thead>tr>th {
            background-color: #0070C0;
            color: #fff;
            padding: 10px;
            border-color: #fff;
        }

        th,
        td {
            padding: 2px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }
    </style>
</head>

<body onload="window.print();">

    <!-- <body> -->
    <?php //$this->load->view('kop_lap'); 
    ?>
    <table border="0" width="100%">
        <tr>
            <td align="left">
                <img src="http://localhost:8000/<?= $setting['logo'] ?>" alt="logo" width="100">
            </td>
            <td align="left">
                <b style="font-size:25px;">PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB)</b> <br>
                <b style="font-size:25px;"><?= $setting['nama_sekolah'] ?></b> <br>
                <b style="font-size:25px;">TAHUN PELAJARAN <?php echo date("Y"); ?>
                </b><br>
                <b align="left" style="font-size:15px;">
                    Kantor : <?= $setting['alamat'] ?> <img src="img/telp.jpg" alt="telp." style="margin-bottom:-5px;margin-right:-5px;"> <?= $setting['no_telp'] ?>
                    <br>
                    Website : http://localhost:8000/ - E-mail : <?php echo $setting['email']; ?></b>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
                <hr size="2" color="black" style="margin:0px;">
            </td>
        </tr>
    </table>
    <br>
    <h4 align="center" style="margin-top:0px;"><u>BUKTI PEMBAYARAN</u></h4>
    <b>
        <center>
            PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB) <br>
            <?php echo $setting['nama_sekolah']; ?> TAHUN PELAJARAN <?php echo date("Y"); ?>-<?php echo date("Y") + 1; ?>
        </center>
    </b>
    <br>

    <table width="100%" border="0">
        <tr>
            <td width="200">NO. PEMBAYARAN</td>
            <td width="1">:</td>
            <td><?php echo $siswa['id_siswa']; ?></td>
        </tr>
        <tr>
            <td>TANGGAL PENDAFTARAN </td>
            <td>:</td>
            <td><?php echo date('d-m-Y', strtotime($siswa['tgl_siswa'])); ?></td>
        </tr>
        <tr>
            <td>TANGGAL CETAK </td>
            <td>:</td>
            <td><?php echo date('d-m-Y'); ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?php echo $siswa['nis']; ?></td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?php echo $siswa['nisn']; ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $siswa['nik']; ?></td>
        </tr>
        <tr>
            <td>NAMA LENGKAP</td>
            <td>:</td>
            <td><?php echo ucwords($siswa['nama_siswa']); ?></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td><?php echo $siswa['jk']; ?></td>
        </tr>
        <tr>
            <td>TEMPAT, TANGGAL LAHIR</td>
            <td>:</td>
            <td><?php echo $siswa['tempat_lahir'] . ', ' . $siswa['tgl_lahir']; ?></td>
        </tr>
        <tr>
            <td>AGAMA</td>
            <td>:</td>
            <td><?php echo $siswa['agama']; ?></td>
        </tr>
        <tr>
            <td>NAMA ORANG TUA /WALI</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td style="padding-left:55px;">AYAH</td>
            <td>:</td>
            <td><?php echo ucwords($siswa['nama_ayah']); ?></td>
        </tr>
        <tr>
            <td style="padding-left:55px;">IBU</td>
            <td>:</td>
            <td><?php echo ucwords($siswa['nama_ibu']); ?></td>
        </tr>
        <tr>
            <td style="padding-left:55px;">WALI</td>
            <td>:</td>
            <td><?php echo ucwords($siswa['nama_wali']); ?></td>
        </tr>
        <tr>
            <td>NO. HANDPHONE (HP)</td>
            <td>:</td>
            <td><?php echo $siswa['no_hp']; ?></td>
        </tr>
        <tr>
            <td>ASAL SEKOLAH</td>
            <td>:</td>
            <td><?php echo ucwords($siswa['nama_sekolah']); ?></td>
        </tr>
    </table>
    <br>

    <center>
        <div style="border:1px solid black; color:green;width:30%;padding:10px;">
            <b style="font-size:20px;">S U D A H B A Y A R</b>
        </div>
    </center>
    <br>

    <div style="float:right;">
        <?php echo $setting['kota']; ?>, <?php echo date('d-m-Y'); ?> <br>
        Ketua Panitia PPDB, <br>
        <img src="http://localhost:8000/assets/tanda.png" alt="" width="100"><br>
        <b><u><?php echo $setting['kepala']; ?></u></b><br>
        NIP. <?php echo $setting['nip']; ?>
    </div>
    <br><br><br><br><br><br><br><br><br>



</body>

</html>