<?php
include "connection.php";

$id_pengajuanprakerin = $_GET['id_pengajuanprakerin'];

class emp
{
}

$Sql_Query = "DELETE FROM pengajuanprakerin WHERE pengajuanprakerin.id_pengajuanprakerin = '$id_pengajuanprakerin'";

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
