<?php

include_once "connection.php";

$id_mentor = $_GET['id_mentor'];

$query = mysqli_query($con, "SELECT * FROM `pengajuanprakerin` join data_peserta on data_peserta.id_peserta=pengajuanprakerin.id_peserta where pengajuanprakerin.status_validasi='Diterima' and pengajuanprakerin.id_mentor='$id_mentor'");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
