<?php
include "connection.php";

$id_peserta = $_GET['id_peserta'];

$query = mysqli_query($con, "SELECT * FROM jurnal_prakerin join pengajuanprakerin join data_mentor on data_mentor.id_mentor=pengajuanprakerin.id_mentor join kompetensi_dasar on kompetensi_dasar.id=jurnal_prakerin.id_kompetensi_dasar join data_peserta on data_peserta.id_peserta=jurnal_prakerin.id_peserta where jurnal_prakerin.id_peserta=$id_peserta group by jurnal_prakerin.id_jurnal_prakerin desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
