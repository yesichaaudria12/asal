<?php

include_once "connection.php";

session_start();

class usr
{
}

$username = $_POST["username"];
$password = $_POST["password"];

if ((empty($username)) || (empty($password))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom nama pengguna atau kata sandi tidak boleh kosong";
	die(json_encode($response));
}

$query = mysqli_query($con, "SELECT * FROM pengguna left join data_peserta on data_peserta.id_peserta=pengguna.id left join data_guru on data_guru.id_guru=pengguna.id left join jurusan on jurusan.id_jurusan=data_guru.id_jurusan or jurusan.id_jurusan=data_peserta.id_jurusan left join pengajuanprakerin on pengajuanprakerin.id_peserta=pengguna.id WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($query);

if (!empty($row)) {
	$response = new usr();
	$response->success = 1;
	$response->id_peserta = $row['id_peserta'];
	$response->id = $row['id'];
	$response->role = $row['role'];
	$response->username = $row['username'];
	$response->nama_peserta = $row['nama_peserta'];
	$response->nama_guru = $row['nama_guru'];
	$response->id_mentor = $row['id_mentor'];
	$response->id_jurusan = $row['id_jurusan'];

	$response->message = "Selamat Datang, " . $row['nama_peserta'] . $row['nama_guru'];
	die(json_encode($response));
} else {
	$response = new usr();
	$response->success = 0;
	$response->message = "Nama pengguna atau kata sandi salah";
	die(json_encode($response));
}

mysqli_close($con);
