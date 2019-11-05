<?php 
require_once "dbConnection.php";
$link = connect();

$pharmName = $_POST['pharmName'];
$pharmAddress = $_POST['pharmAddress'];
$pharmPhone = $_POST['pharmPhone'];
$pharmEmail =$_POST['pharmEmail'];
$pharmId = $_POST['pharmId'];
$update = "UPDATE pharmacy SET pharmName = '$pharmName', pharmAddress = '$pharmAddress', pharmPhone = '$pharmPhone', pharmEmail = '$pharmEmail' WHERE pharmId = '$pharmId'";
setData($update);
echo("<script> window.location.replace('pharms.php'); </script>");
 
?>