<?php 
require_once "dbConnection.php";
$link = connect();

$hospName = $_POST['hospName'];
$hospAddress = $_POST['hospAddress'];
$hospOpeningHrs = $_POST['hospOpeningHrs'];
$hospClosingHrs =$_POST['hospClosingHrs'];
$hospAdmin =$_POST['hospAdmin'];
$adminEmail =$_POST['adminEmail'];
$hospLat =$_POST['hospLat'];
$hospLong =$_POST['hospLong'];
$hospId = $_POST['hospId'];
$update = "UPDATE hospital SET hospName = '$hospName', hospAddress = '$hospAddress', hospOpeningHrs = '$hospOpeningHrs', hospClosingHrs = '$hospClosingHrs' , hospAdmin = '$hospAdmin', adminEmail = '$adminEmail' , hospLat = '$hospLat', hospLong = '$hospLong' WHERE hospId = '$hospId'";
setData($update);
echo("<script> window.location.replace('hosps.php'); </script>");
 
?>