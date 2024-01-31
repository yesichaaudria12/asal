<?php
include "connection.php";

$id_catatan_kunjungan_prakerin = $_POST['id_catatan_kunjungan_prakerin'];
$id_guru = $_POST['id_guru'];
$tanggal_kunjungan = $_POST['tanggal_kunjungan'];
$catatan_pembimbing = $_POST['catatan_pembimbing'];

class emp
{
}

$Sql_Query = "UPDATE catatan_kunjungan_prakerin set id_guru = '$id_guru', tanggal_kunjungan = '$tanggal_kunjungan', catatan_pembimbing = '$catatan_pembimbing' WHERE catatan_kunjungan_prakerin.id_catatan_kunjungan_prakerin = '$id_catatan_kunjungan_prakerin'";

if (mysqli_query($con, $Sql_Query)) {
    $status_pesan = new emp();
    $status_pesan->status_kode = 1;
    $status_pesan->status_pesan = "Data berhasil diubah";
    die(json_encode($status_pesan));
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
    $status_pesan->status_pesan = "Terjadi kesalahan ubah data";
    die(json_encode($status_pesan));
}

mysqli_close($con);
