<?php
include "connection.php";

class emp
{
}

$id_peserta = $_GET['id_peserta'];

$query = mysqli_query($con, "SELECT * FROM catatan_kunjungan_prakerin join data_guru on data_guru.id_guru=catatan_kunjungan_prakerin.id_guru join pengajuanprakerin on pengajuanprakerin.id_guru=catatan_kunjungan_prakerin.id_guru where pengajuanprakerin.id_peserta=$id_peserta order by catatan_kunjungan_prakerin.id_catatan_kunjungan_prakerin desc");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
	$json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
