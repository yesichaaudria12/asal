<?php
include "connection.php";

$id_program_prakerin = $_POST['id_program_prakerin'];
$id_peserta = $_POST['id_peserta'];
$tanggal = $_POST['tanggal'];
$id_kompetensi_dasar = $_POST['id_kompetensi_dasar'];
$topik_pekerjaan = $_POST['topik_pekerjaan'];

class emp
{
}

$Sql_Query = "UPDATE program_prakerin set id_peserta = '$id_peserta', id_kompetensi_dasar = '$id_kompetensi_dasar', tanggal = '$tanggal', topik_pekerjaan = '$topik_pekerjaan' where program_prakerin.id_program_prakerin='$id_program_prakerin'";

if (mysqli_query($con, $Sql_Query)) {
    $status_pesan = new emp();
    $status_pesan->status_kode = 1;
    $status_pesan->status_pesan = "Data berhasil diubah";
    die(json_encode($status_pesan));
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
    $status_pesan->status_pesan = "Terjadi kesalahan simpan data";
    die(json_encode($status_pesan));
}

mysqli_close($con);
