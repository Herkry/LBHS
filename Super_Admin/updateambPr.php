<?php 
require_once "dbConnection.php";
$link = connect();

$ambNoPlate = $_POST['ambNoPlate'];
$ambType = $_POST['ambType'];
$ambDriverName = $_POST['ambDriverName'];
$ambDriverPhone =$_POST['ambDriverPhone'];
$ambCapacity =$_POST['ambCapacity'];
$ambEmail =$_POST['ambEmail'];
$ambId = $_POST['ambId'];
$update = "UPDATE ambulance SET ambNoPlate = '$ambNoPlate', ambType = '$ambType', ambDriverName = '$ambDriverName', ambDriverPhone = '$ambDriverPhone' , ambCapacity = '$ambCapacity', ambEmail = '$ambEmail' WHERE ambId = '$ambId'";
setData($update);
echo("<script> window.location.replace('ambs.php'); </script>");
 
?>