<?php

header("Content-type: text/css; charset: UTF-8");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



require_once "dbConnection.php";
$link = connect();
$pharmId = $_SESSION["id"];


$status1 = "Done";
$status0 = "awaiting pharmacist";
$checker0 = mysqli_query($link,"SELECT pharmacyRequestId FROM `pharmacyrequests` WHERE pharmId = '$pharmId' AND `requestStatus`= '$status0'");
$checker1 = mysqli_query($link,"SELECT pharmacyRequestId FROM `pharmacyrequests` WHERE pharmId = '$pharmId' AND `requestStatus`= '$status1'");
$res0 = mysqli_num_rows($checker0);
$res1 = mysqli_num_rows($checker1);
$tot = $res0 + $res1;
if($tot!=0){
$width1 = ($res1*100)/$tot;
$width0 = ($res0*100)/$tot;


?>

#stat0{
  width:<?php echo $width0; ?>%;
}
#stat1{
  width:<?php echo $width1; }?>%;
}