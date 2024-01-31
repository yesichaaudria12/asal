<?php
include "connection.php";

$query = mysqli_query($con, "SELECT * FROM `catatan_kunjungan_pkl` join data_guru on data_guru.id_guru=catatan_kunjungan_pkl.id_guru join pengajuanpkl on pengajuanpkl.id_guru=catatan_kunjungan_pkl.id_guru join data_mentor on data_mentor.id_mentor=pengajuanpkl.id_mentor order by data_mentor.nama_mentor asc, catatan_kunjungan_pkl.id_catatan_kunjungan_pkl desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
