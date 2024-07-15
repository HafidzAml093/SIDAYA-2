<?php
// koneksi database
include 'koneksi.php';

//menangkap data yang di kirim dari form

$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];

//menginput data ke database
mysqli_query($koneksi, "insert into kantor values('','$nama','$umur','$alamat')");

//mengalihkan halaman kembali ke index.php
header("location:index.php");

?>