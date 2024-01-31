<?php
include "connection.php";

$id_catatan_kunjungan_prakerin = $_GET['id_catatan_kunjungan_prakerin'];

class emp
{
}

$Sql_Query = "DELETE FROM catatan_kunjungan_prakerin WHERE catatan_kunjungan_prakerin.id_catatan_kunjungan_prakerin = '$id_catatan_kunjungan_prakerin'";

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
