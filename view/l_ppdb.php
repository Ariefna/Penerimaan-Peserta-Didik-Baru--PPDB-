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
    <h4 align="center" style="margin-top:0px;"><u>BUKTI PENDAFTARAN</u></h4>
    <b>
        <center>
            PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB) <br>
            <?php echo $setting['nama_sekolah']; ?> TAHUN PELAJARAN <?php echo date("Y"); ?>-<?php echo date("Y") + 1; ?>
        </center>
    </b>
    <br>



</body>

</html>