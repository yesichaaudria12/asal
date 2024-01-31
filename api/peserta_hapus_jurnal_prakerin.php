<?php
include "connection.php";

$id_jurnal_prakerin = $_GET['id_jurnal_prakerin'];

class emp
{
}

$getdata = mysqli_query($con, "SELECT * FROM jurnal_prakerin where id_jurnal_prakerin = '$id_jurnal_prakerin'");
$row = mysqli_fetch_array($getdata);

if (!empty($row)) {
    if ($row['dokumentasi'] != 'default.jpg') {
        unlink("../dokumentasi/" . $row['dokumentasi']);
    }
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
    $status_pesan->status_pesan = "Terjadi kesalahan hapus gambar";
    die(json_encode($status_pesan));
}

$Sql_Query = "DELETE FROM jurnal_prakerin WHERE id_jurnal_prakerin = '$id_jurnal_prakerin'";

if (mysqli_query($con, $Sql_Query)) {
    $status_pesan = new emp();
    $status_pesan->status_kode = 1;
    $status_pesan->status_pesan = "Data berhasil dihapus";
    die(json_encode($status_pesan));
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
    $status_pesan->status_pesan = "Terjadi kesalahan hapus data";
    die(json_encode($status_pesan));
}

mysqli_close($con);
