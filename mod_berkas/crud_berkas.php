<?php
require("/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/model/json/config/database.php");
require("/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/model/json/config/function.php");
require("/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/model/json/config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $ektensi = ['jpg', 'jpeg', 'png'];
    if ($_FILES['file_kk']['name'] <> '') {
        $file_kk = $_FILES['file_kk']['name'];
        $temp = $_FILES['file_kk']['tmp_name'];
        $ext = explode('.', $file_kk);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = '/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/assets/upload/kk/kk' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_kk' => $dest
                ];
                $id_siswa = $_SESSION['id_user'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_pembayaran']['name'] <> '') {
        $file_pembayaran = $_FILES['file_pembayaran']['name'];
        $temp = $_FILES['file_pembayaran']['tmp_name'];
        $ext = explode('.', $file_pembayaran);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = '/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/assets/upload/pay/pay' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_pembayaran' => $dest
                ];
                $id_siswa = $_SESSION['id_user'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_ijazah']['name'] <> '') {
        $file_ijazah = $_FILES['file_ijazah']['name'];
        $temp = $_FILES['file_ijazah']['tmp_name'];
        $ext = explode('.', $file_ijazah);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = '/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/assets/upload/ijazah/ijazah' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_ijazah' => $dest
                ];
                $id_siswa = $_SESSION['id_user'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_akte']['name'] <> '') {
        $file_akte = $_FILES['file_akte']['name'];
        $temp = $_FILES['file_akte']['tmp_name'];
        $ext = explode('.', $file_akte);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = '/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/assets/upload/akta/akta' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_akte' => $dest
                ];
                $id_siswa = $_SESSION['id_user'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_kip']['name'] <> '') {
        $file_kip = $_FILES['file_kip']['name'];
        $temp = $_FILES['file_kip']['tmp_name'];
        $ext = explode('.', $file_kip);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = '/home/linux/project/other/Penerimaan-Peserta-Didik-Baru--PPDB-/assets/upload/kip/kip' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_kip' => $dest
                ];
                $id_siswa = $_SESSION['id_user'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
} else {
    echo "Gagal menyimpan";
}
