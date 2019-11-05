<?php 
require_once "dbConnection.php";
$link = connect();

$docFname = $_POST['docFname'];
$docLname = $_POST['docLname'];
$docPhone = $_POST['docPhone'];
$docSpecialty =$_POST['docSpecialty'];
$docEmail =$_POST['docEmail'];
$docId = $_POST['docId'];
$updateDoc = "UPDATE doctor SET docFname = '$docFname', docLname = '$docLname', docPhone = '$docPhone', docSpecialty = '$docSpecialty', docEmail = '$docEmail' WHERE docId = '$docId'";
setData($updateDoc);
header("location: /LBHS/patMapAdmin.php");
//echo("<script> window.location.replace('docs.php'); </script>");
 
?>