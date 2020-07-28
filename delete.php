<?php

include "database.php";
global $con;
$id=$_GET['num'];

$get_vm=mysqli_query($con,"select * from proyek where id=".$id);
$row=mysqli_fetch_assoc($get_vm);
$vmxpath=$row['path'];

$cmd = "\"C:/Users/Eryn/Desktop/vix/Debug/vix.exe\" DELETE \"$vmxpath\" ";

$c = shell_exec($cmd);

$delete = "DELETE from proyek where id=".$id;
mysqli_query($con, $delete) or die(mysqli_error($con));
echo "<script> alert('Data Succesfully Deleted'); </script>";

echo "<script> location='home.php'; </script>";


?>