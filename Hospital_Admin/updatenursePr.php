<?php 
require_once "dbConnection.php";
$link = connect();

$nurseFname = $_POST['nurseFname'];
$nurseLname = $_POST['nurseLname'];
$nursePhone = $_POST['nursePhone'];
$nurseEmail =$_POST['nurseEmail'];
$nurseId = $_POST['nurseId'];
$updateNurse = "UPDATE nurse SET nurseFname = '$nurseFname', nurseLname = '$nurseLname', nursePhone = '$nursePhone', nurseEmail = '$nurseEmail' WHERE nurseId = '$nurseId'";
setData($updateNurse);
echo("<script> window.location.replace('nurses.php'); </script>");
 
?>