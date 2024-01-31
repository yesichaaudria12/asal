<?php

include_once "connection.php";

$id_peserta = $_GET['id_peserta'];
$id_mentor = $_GET['id_mentor'];
$tanggal_absensi = $_GET['tanggal_absensi'];

$query = mysqli_query($con, "SELECT * FROM `absensi` join data_peserta on data_peserta.id_peserta=absensi.id_peserta where absensi.id_peserta='$id_peserta' and absensi.tanggal_absensi = '$tanggal_absensi' order by id_absensi desc");
$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
