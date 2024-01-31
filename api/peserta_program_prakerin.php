<?php
include "connection.php";

$id_peserta = $_GET['id_peserta'];

$query = mysqli_query($con, "SELECT * FROM `program_prakerin` join pengajuanprakerin join data_mentor on data_mentor.id_mentor=pengajuanprakerin.id_mentor join kompetensi_dasar on kompetensi_dasar.id=program_prakerin.id_kompetensi_dasar join data_peserta on data_peserta.id_peserta=program_prakerin.id_peserta where program_prakerin.id_peserta=$id_peserta group by program_prakerin.id_program_prakerin desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
