<?php
include "connection.php";

$id_peserta = $_GET['id_peserta'];
$tanggal = $_GET['tanggal'];

$query = mysqli_query($con, "SELECT * FROM jurnal_pkl join pengajuanpkl join data_mentor on data_mentor.id_mentor=pengajuanpkl.id_mentor join kompetensi_dasar on kompetensi_dasar.id=jurnal_pkl.id_kompetensi_dasar join data_peserta on data_peserta.id_peserta=jurnal_pkl.id_peserta where jurnal_pkl.id_peserta='$id_peserta' and jurnal_pkl.tanggal='$tanggal' group by jurnal_pkl.id_jurnal_pkl desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
