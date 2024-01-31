<?php

include_once "connection.php";

$id_jurusan = $_GET['id_jurusan'];

$query = mysqli_query($con, "SELECT id_mentor, nama_mentor FROM data_mentor where id_jurusan='$id_jurusan' ORDER BY id_mentor ASC");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
	$json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
