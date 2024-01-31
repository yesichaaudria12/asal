<?php
include "connection.php";

$id_jurusan = $_GET['id_jurusan'];

$query = mysqli_query($con, "SELECT * FROM data_mentor where id_jurusan='$id_jurusan' ORDER BY nama_mentor ASC");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
	$json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
