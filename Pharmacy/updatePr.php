<?php 
require_once "dbConnection.php";
$link = connect();

$medName = $_POST['medName'];
$medUnitPrice = $_POST['medUnitPrice'];
$medTotAmt = $_POST['medTotAmt'];
$medUnitAmt =$_POST['medUnitAmt'];
$medId = $_POST['medId'];
$updateMedicine = "UPDATE medicine SET medName = '$medName', medUnitPrice = '$medUnitPrice', medTotAmt = '$medTotAmt', medUnitAmt = '$medUnitAmt' WHERE medId = '$medId'";
setData($updateMedicine);
echo("<script> window.location.replace('stock.php'); </script>");
 
?>