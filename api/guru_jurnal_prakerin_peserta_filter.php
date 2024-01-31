<?php
include "connection.php";

$id_guru = $_GET['id_guru'];
$tanggal = $_GET['tanggal'];

$query = mysqli_query($con, "SELECT * FROM jurnal_prakerin join data_peserta on data_peserta.id_peserta=jurnal_prakerin.id_peserta join pengajuanprakerin on pengajuanprakerin.id_peserta=jurnal_prakerin.id_peserta join kompetensi_dasar on kompetensi_dasar.id=jurnal_prakerin.id_kompetensi_dasar join data_mentor on data_mentor.id_mentor=pengajuanprakerin.id_mentor where pengajuanprakerin.id_guru='$id_guru' and jurnal_prakerin.tanggal='$tanggal' order by jurnal_prakerin.id_jurnal_prakerin desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
