<?php

include_once "connection.php";

$id_mentor = $_GET['id_mentor'];

$query = mysqli_query($con, "SELECT * FROM `absensi` join pengajuanpkl on pengajuanpkl.id_siswa=absensi.id_siswa join data_siswa on data_siswa.id_siswa=absensi.id_siswa where pengajuanpkl.id_mentor='$id_mentor' order by id_absensi desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
