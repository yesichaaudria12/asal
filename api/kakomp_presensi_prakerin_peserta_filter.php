<?php
include "connection.php";

$tanggal_absensi = $_GET['tanggal_absensi'];

$query = mysqli_query($con, "SELECT * FROM absensi join data_mentor join pengajuanprakerin on pengajuanprakerin.id_mentor=data_mentor.id_mentor join data_peserta on data_peserta.id_peserta=absensi.id_peserta where absensi.tanggal_absensi='$tanggal_absensi' group by absensi.id_peserta order BY tanggal_absensi DESC");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);