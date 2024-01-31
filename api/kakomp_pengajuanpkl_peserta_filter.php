<?php

require_once('connection.php');

$status_validasi = $_GET['status_validasi'];

$query = mysqli_query($con, "SELECT * FROM pengajuanpkl LEFT JOIN data_guru on data_guru.id_guru = pengajuanpkl.id_guru join data_peserta on data_peserta.id_peserta=pengajuanpkl.id_peserta join data_mentor on data_mentor.id_mentor=pengajuanpkl.id_mentor where pengajuanpkl.status_validasi='$status_validasi' ORDER BY data_mentor.nama_mentor asc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
