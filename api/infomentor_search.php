<?php
include "connection.php";

$nama_mentor = $_GET['nama_mentor'];
$id_jurusan = $_GET['id_jurusan'];

$query = mysqli_query($con, "SELECT * FROM data_mentor where nama_mentor like '%$nama_mentor%' and id_jurusan='$id_jurusan' ORDER BY nama_mentor ASC");

$json = array();

while ($row = mysqli_fetch_assoc($query)) {
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($con);
