<?php

require_once('connection.php');

$query = mysqli_query($con, "SELECT * FROM pengajuanpkl LEFT JOIN data_guru on data_guru.id_guru = pengajuanpkl.id_guru join data_siswa on data_siswa.id_siswa=pengajuanpkl.id_siswa join data_mentor on data_mentor.id_mentor=pengajuanpkl.id_mentor ORDER BY data_mentor.nama_mentor asc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
