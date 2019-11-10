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
$hospId = $_SESSION["id"];


$status1 = "awaiting doctor";
$status0 = "Being Assisted";
$checker0 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId' AND `listStatus`= '$status0'");
$checker1 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId' AND `listStatus`= '$status1'");
$res0 = mysqli_num_rows($checker0);
$res1 = mysqli_num_rows($checker1);
$tot = $res0 + $res1;
if($tot!=0){
$stat1 = ($res1*100)/$tot;
$stat0 = ($res0*100)/$tot;


$width1 = $stat1;
$width0 = $stat0;

?>

#stat0{
  width:  <?php echo $width0; ?>%;
}
#stat1{
  width:  <?php echo $width1; }?>%;
}