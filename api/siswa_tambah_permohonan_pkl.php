<?php
include "connection.php";

$id_siswa = $_GET['id_siswa'];
$id_mentor = $_GET['id_mentor'];

class emp
{
}

$Sql_Query = "INSERT INTO pengajuanpkl (id_siswa, id_mentor) values ('$id_siswa','$id_mentor')";

$query = mysqli_query($con, "SELECT * from data_mentor where id_mentor = $id_mentor and kuota > 0");

$row = mysqli_fetch_array($query);

if ($row['kuota'] != null) {
    mysqli_query($con, $Sql_Query);
    $status_pesan = new emp();
    $status_pesan->kuota = $row['kuota'];
    $status_pesan->status_kode = 1;
    $status_pesan->status_pesan = "Permohonan Prakerin diterima, cek aplikasi secara berkala untuk mengetahui penerimaan permohonan PKL";
    die(json_encode($status_pesan));
} else {
    $status_pesan = new emp();
    $status_pesan->status_kode = 0;
<<<<<<< HEAD
    $status_pesan->status_pesan = "Maaf, kuota pada MENTOR yang Anda pilih sudah penuh, silahkan pilih MENTOR lain atau hubungi Admin PKL";
=======
    $status_pesan->status_pesan = "Maaf, kuota pada Mentor yang Anda pilih sudah penuh, silahkan pilih Mentor lain atau hubungi Admin PKL";
>>>>>>> dcdb6b7cac21551be589f75c7f02a4e42e31020b
    die(json_encode($status_pesan));
}

mysqli_close($con);
