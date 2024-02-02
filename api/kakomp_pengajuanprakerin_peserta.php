<?php

require_once('connection.php');

$query = mysqli_query($con, "SELECT * FROM pengajuanprakerin LEFT JOIN data_guru on data_guru.id_guru = pengajuanprakerin.id_guru join data_peserta on data_peserta.id_peserta=pengajuanprakerin.id_peserta join data_mentor on data_mentor.id_mentor=pengajuanprakerin.id_mentor ORDER BY data_mentor.nama_mentor asc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);