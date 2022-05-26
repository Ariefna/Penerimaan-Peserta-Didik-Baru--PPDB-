<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "arief";
$database = "nas";

// koneksi database
$koneksi = mysqli_connect($server, $username, $password, $database);
// cek koneksi
if (!$koneksi) {
    die('Koneksi Database Gagal : ');
}
function enkripsi($string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';
    $secret_iv = 'abcdefghijklmnopqrstuvwxyzABNCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+|}{:?><';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);

    return $output;
}
$setting = mysqli_fetch_array(mysqli_query($koneksi, "select * from setting where id_setting='1'"));
function insert($koneksi, $table, $data = null)
{
    $command = 'INSERT INTO ' . $table;
    $field = $value = null;
    foreach ($data as $f => $v) {
        $field    .= ',' . $f;
        $value    .= ", '" . $v . "'";
    }
    $command .= ' (' . substr($field, 1) . ')';
    $command .= ' VALUES(' . substr($value, 1) . ')';
    $exec = mysqli_query($koneksi, $command);
    ($exec) ? $status = 'OK' : $status = 'NO';
    return $status;
}

function update($koneksi, $table, $data = null, $where = null)
{
    $command = 'UPDATE ' . $table . ' SET ';
    $field = $value = null;
    foreach ($data as $f => $v) {
        $field    .= "," . $f . "='" . $v . "'";
    }
    $command .= substr($field, 1);
    if ($where != null) {
        foreach ($where as $f => $v) {
            $value .= "#" . $f . "='" . $v . "'";
        }
        $command .= ' WHERE ' . substr($value, 1);
        $command = str_replace('#', ' AND ', $command);
    }
    $exec = mysqli_query($koneksi, $command);
    ($exec) ? $status = 'OK' : $status = 'NO';
    return $status;
}

function delete($koneksi, $table, $where = null)
{
    $command = 'DELETE FROM ' . $table;
    if ($where != null) {
        $value = null;
        foreach ($where as $f => $v) {
            $value .= "#" . $f . "='" . $v . "'";
        }
        $command .= ' WHERE ' . substr($value, 1);
        $command = str_replace('#', ' AND ', $command);
    }
    $exec = mysqli_query($koneksi, $command);
    ($exec) ? $status = 'OK' : $status = 'NO';
    return $status;
}

function fetch($koneksi, $table, $where = null)
{
    $command = 'SELECT * FROM ' . $table;
    if ($where != null) {
        $value = null;
        foreach ($where as $f => $v) {
            $value .= "#" . $f . "='" . $v . "'";
        }
        $command .= ' WHERE ' . substr($value, 1);
        $command = str_replace('#', ' AND ', $command);
    }
    $sql = mysqli_query($koneksi, $command);
    $exec = mysqli_fetch_assoc($sql);
    return $exec;
}

function select($koneksi, $table, $where = null, $order = null, $limit = null)
{
    $command = 'SELECT * FROM ' . $table;
    if ($where != null) {
        $value = null;
        foreach ($where as $f => $v) {
            $value .= "#" . $f . "='" . $v . "'";
        }
        $command .= ' WHERE ' . substr($value, 1);
        $command = str_replace('#', ' AND ', $command);
    }
    ($order != null) ? $command .= ' ORDER BY ' . $order : null;
    ($limit != null) ? $command .= ' LIMIT ' . $limit : null;
    $result = array();
    $sql = mysqli_query($koneksi, $command);
    while ($field = mysqli_fetch_assoc($sql)) {
        $result[] = $field;
    }
    return $result;
}

function rowcount($koneksi, $table, $where = null)
{
    $command = 'SELECT * FROM ' . $table;
    if ($where != null) {
        $value = null;
        foreach ($where as $f => $v) {
            $value .= "#" . $f . "='" . $v . "'";
        }
        $command .= ' WHERE ' . substr($value, 1);
        $command = str_replace('#', ' AND ', $command);
    }
    $exec = mysqli_num_rows(mysqli_query($koneksi, $command));
    return $exec;
}

function truncate($koneksi, $table)
{
    $command = 'TRUNCATE ' . $table;
    $exec = mysqli_query($koneksi, $command);
    ($exec) ? $status = 'OK' : $status = 'NO';
    return $status;
}
function buat_tanggal($format, $time = null)
{
    $time = ($time == null) ? time() : strtotime($time);
    $str = date($format, $time);
    for ($t = 1; $t <= 9; $t++) {
        $str = str_replace("0$t ", "$t ", $str);
    }
    $str = str_replace("Jan", "Januari", $str);
    $str = str_replace("Feb", "Februari", $str);
    $str = str_replace("Mar", "Maret", $str);
    $str = str_replace("Apr", "April", $str);
    $str = str_replace("May", "Mei", $str);
    $str = str_replace("Jun", "Juni", $str);
    $str = str_replace("Jul", "Juli", $str);
    $str = str_replace("Aug", "Agustus", $str);
    $str = str_replace("Sep", "September", $str);
    $str = str_replace("Oct", "Oktober", $str);
    $str = str_replace("Nov", "Nopember", $str);
    $str = str_replace("Dec", "Desember", $str);
    $str = str_replace("Mon", "Senin", $str);
    $str = str_replace("Tue", "Selasa", $str);
    $str = str_replace("Wed", "Rabu", $str);
    $str = str_replace("Thu", "Kamis", $str);
    $str = str_replace("Fri", "Jumat", $str);
    $str = str_replace("Sat", "Sabtu", $str);
    $str = str_replace("Sun", "Minggu", $str);
    return $str;
}
