<?php

if($_POST['submit']){
	include "database.php";
	global $con;
	$path=$_POST['path'];

	$insert = "insert into proyek values (null,'$path','OFF')";
	mysqli_query($con, $insert) or die(mysqli_error($con));
	echo "<script> alert('Data Successfully Added'); </script>";
	echo "<script> location='home.php'; </script>";
}



?>