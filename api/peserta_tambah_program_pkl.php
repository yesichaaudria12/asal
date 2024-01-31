<?php
include "connection.php";

$id_peserta = $_GET['id_peserta'];
$tanggal = $_GET['tanggal'];
$id_kompetensi_dasar = $_GET['id_kompetensi_dasar'];
$topik_pekerjaan = $_GET['topik_pekerjaan'];

class emp
{
}

$Sql_Query = "INSERT INTO program_pkl (id_peserta, id_kompetensi_dasar, tanggal, topik_pekerjaan) values ('$id_peserta','$id_kompetensi_dasar','$tanggal','$topik_pekerjaan')";

if (mysqli_query($con, $Sql_Query)) {
    $status_pesan = new emp();
    $status_pesan->status_kode = 1;
    $status_pesan->status_pesan = "Data berhasil disimpan";
    die(json_encode($status_pesan));
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
    $status_pesan->status_pesan = "Error simpan Data";
    die(json_encode($status_pesan));
}

mysqli_close($con);
