<?php
//THIS PAGE PROCESSES dashboard.php FOR DOCTOR AND REDIRECTS DOCTOR TO edit.php
//Require
require("sqlFunctions.php");

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Defining DB parameters
$docId =  $_SESSION["id"];
$patInSessionId = $_POST["patInSessionId"];
$listStatus = "doctor session";

//TEST
//echo($patInSessionId);

//Change patient listStatus to "doctor session" --WHERE listStatus = "awaiting doctor"
$updatePatStatus = "UPDATE waitingList SET listStatus = '$listStatus' WHERE patId = '$patInSessionId' AND listStatus = 'awaiting doctor'";
setData($updatePatStatus);

//Reduce docQueue by 1
//First select docQueue from DB 
$selectDocQueue = "SELECT docQueue FROM doctor WHERE docId = '$docId'";
$rowDocQueue = getData($selectDocQueue);
$docQueue = $rowDocQueue[0]['docQueue'];

//TEST
//echo($docQueue);

//Update docQueue by subtracting 1
$docQueue = $docQueue - 1;

//Update Doctor relation with updated docQueue
$changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docId = '$docId'";
setData($changeDocQueue); 

header("Location: edit.php");
?>