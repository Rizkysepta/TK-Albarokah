<?php 
// koneksi database
include 'dbcon.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$telp = $_POST['telp'];
$kelas = $_POST['kelas'];

// menginput data ke database
mysqli_query($con,"insert into tb_murid values('','$nama','$nisn', '$kelamin', '$alamat', '$telp', '$kelas')");
 
// mengalihkan halaman kembali ke index.php
header("location:student.php");
 
?>