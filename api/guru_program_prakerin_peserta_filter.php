<?php
include "connection.php";

$id_guru = $_GET['id_guru'];
$tanggal = $_GET['tanggal'];

$query = mysqli_query($con, "SELECT * FROM program_prakerin join kompetensi_dasar on kompetensi_dasar.id=program_prakerin.id_kompetensi_dasar join data_peserta on data_peserta.id_peserta=program_prakerin.id_peserta join pengajuanprakerin on pengajuanprakerin.id_peserta=program_prakerin.id_peserta join data_mentor on data_mentor.id_mentor=pengajuanprakerin.id_mentor where pengajuanprakerin.id_guru=$id_guru and program_prakerin.tanggal='$tanggal' order by program_prakerin.id_program_prakerin desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
