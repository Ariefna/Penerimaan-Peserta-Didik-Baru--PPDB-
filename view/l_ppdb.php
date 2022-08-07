<?php
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
        @media all {

            .customers td,
            .customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            .customers tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .customers tr:hover {
                background-color: #ddd;
            }

            .customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #0070C0;
                color: white;
            }

            body {
                -webkit-print-color-adjust: exact;
                background-color: white !important;
            }

        }
    </style>
</head>

<body onload="window.print();">
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
    <?php
    for ($i = 1; $i <= 3; $i++) {
        if ($i == 1) {
            $alumni = "Umum";
        } else if ($i == 2) {
            $alumni = "Alumni";
        } else if ($i == 3) {
            $alumni = "Prestasi";
        }
    ?>
        <center>
            <h1><?= $alumni ?></h1>
        </center>
        <table id="example1" class="table table-bordered table-striped customers" width="100%">
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
                $query = mysqli_query($koneksi, "select * from siswa where alumni = " . $i . " order by status");
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
                        <td><?= $siswa['status_pay'] == 1 ? "Lunas" : "Belum Lunas" ?></td>
                        <td><?= $siswa['id_siswa'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <br>
    <table width="25%" border="0">
        <tr>
            <td>TANGGAL CETAK </td>
            <td>:</td>
            <td><?php echo date('d-m-Y'); ?></td>
        </tr>
    </table>
    <div style="float:right;">
        <?php echo $setting['kota']; ?>, <?php echo date('d-m-Y'); ?> <br>
        Ketua Panitia PPDB, <br>
        <img src="http://localhost:8000/assets/tanda.png" alt="" width="100"><br>
        <b><u><?php echo $setting['kepala']; ?></u></b><br>
        NIP. <?php echo $setting['nip']; ?>
    </div>


</body>

</html>