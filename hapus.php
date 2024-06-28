<?php 
include 'dbcon.php';
$delete = $_GET['id'];
mysqli_query($con, "DELETE FROM tb_murid WHERE id_murid='$delete'")or die(mysql_error());
 
header("location:student.php");
?>