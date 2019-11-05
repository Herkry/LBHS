<?php 
require_once "dbConnection.php";
$link = connect();

$patFname = $_POST['patFname'];
$patLname = $_POST['patLname'];
$patPhone = $_POST['patPhone'];
$patEmail =$_POST['patEmail'];
$patId = $_POST['patId'];
$updatepat = "UPDATE patient SET patFname = '$patFname', patLname = '$patLname', patPhone = '$patPhone', patEmail = '$patEmail' WHERE patId = '$patId'";
setData($updatepat);
echo("<script> window.location.replace('pats.php'); </script>");
 
?>