<?php
include "connection.php";

$id_peserta = $_GET['id_peserta'];

$query = mysqli_query($con, "SELECT * FROM `program_pkl` join pengajuanpkl join data_mentor on data_mentor.id_mentor=pengajuanpkl.id_mentor join kompetensi_dasar on kompetensi_dasar.id=program_pkl.id_kompetensi_dasar join data_peserta on data_peserta.id_peserta=program_pkl.id_peserta where program_pkl.id_peserta=$id_peserta group by program_pkl.id_program_pkl desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
