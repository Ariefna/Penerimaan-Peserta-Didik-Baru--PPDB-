<?php
require($_SERVER['DOCUMENT_ROOT']  . "/model/json/config/database.php");
require($_SERVER['DOCUMENT_ROOT']  . "/model/json/config/function.php");
require($_SERVER['DOCUMENT_ROOT']  . "/model/json/config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

// $dest = 'assets/img/logo' .$random.'.' . $ext;
// $upload = move_uploaded_file($temp, $_SERVER['DOCUMENT_ROOT']  . '/' . $dest);
$random = rand(1, 1000);
if ($pg == 'ubah') {
    $ektensi = ['jpg', 'jpeg', 'png'];
    if ($_FILES['file_kk']['name'] <> '' || isset($_FILES['file_kk'])) {
        $file_kk = $_FILES['file_kk']['name'];
        $temp = $_FILES['file_kk']['tmp_name'];
        $ext = explode('.', $file_kk);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = $_SERVER['DOCUMENT_ROOT']  . '/assets/upload/kk/kk' . $random . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_kk' => 'kk' . $random . '.' . $ext
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }

    if ($_FILES['file_ijazah']['name'] <> '' || isset($_FILES['file_ijazah'])) {
        $file_ijazah = $_FILES['file_ijazah']['name'];
        $temp = $_FILES['file_ijazah']['tmp_name'];
        $ext = explode('.', $file_ijazah);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = $_SERVER['DOCUMENT_ROOT']  . '/assets/upload/ijazah/ijazah' . $random . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_ijazah' => 'ijazah' . $random . '.' . $ext
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_akte']['name'] <> '' || isset($_FILES['file_akte'])) {
        $file_akte = $_FILES['file_akte']['name'];
        $temp = $_FILES['file_akte']['tmp_name'];
        $ext = explode('.', $file_akte);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = $_SERVER['DOCUMENT_ROOT']  . '/assets/upload/akta/akta' . $random . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_akte' => 'akta' . $random . '.' . $ext
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file_kip']['name'] <> '' || isset($_FILES['file_kip'])) {
        $file_kip = $_FILES['file_kip']['name'];
        $temp = $_FILES['file_kip']['tmp_name'];
        $ext = explode('.', $file_kip);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = $_SERVER['DOCUMENT_ROOT']  . '/assets/upload/kip/kip' . $random . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_kip' => 'kip' . $random . '.' . $ext
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
} else if ($pg == 'bayar') {
    if ($_FILES['file_pembayaran']['name'] <> '' || isset($_FILES['file_pembayaran'])) {
        $file_pembayaran = $_FILES['file_pembayaran']['name'];
        $temp = $_FILES['file_pembayaran']['tmp_name'];
        $ext = explode('.', $file_pembayaran);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = $_SERVER['DOCUMENT_ROOT']  . '/assets/upload/pay/pay' . $random . '.' . $ext;
            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'file_pembayaran' => 'pay' . $random . '.' . $ext
                ];
                $id_siswa = $_POST['id_siswa'];
                $exec = update($koneksi, 'siswa', $data2, ['id_siswa' => $id_siswa]);
            } else {
                echo "gagal";
            }
        }
    }
} else {
    echo "Gagal menyimpan";
}
