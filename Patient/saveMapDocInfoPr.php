<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}




//Get SQL Functions
require("dbConnection.php");
$link = connect();

// get the docName parameter from Map and patientId from  SESSION VARIABLE, and other DB parameters
$docName = $_POST["submit"];
$docName = substr($docName, -5);
$patId = $_SESSION["id"];
$listStatus = "Being Assisted";
//waitlistId CHECK
//registrationTime CHECK

//TEST


//Insert into WaitingList relation and update Doc queue//

//First select docId from doctors table
$selectDocId = "SELECT docId, hospId FROM doctor WHERE docFname = '$docName'";
$result = $link->query($selectDocId);
$docId = 0;
$hospId = 0;
while ($row = $result->fetch_assoc()){

    $docId = $row['docId'];
    $hospId = $row['hospId'];
}
//$rowDocId = getData($selectDocId);
//$docId = $rowDocId[0]['docId'];




//Update docQueue by 1//
//First select docQueue from DB 
$selectDocQueue = "SELECT docQueue FROM doctor WHERE docFname = '$docName'";
$result = $link->query($selectDocQueue);
$docQueue = 0;
while ($row = $result->fetch_assoc()){
    $docQueue = $row['docQueue'];
    $docQueue = $docQueue + 1;

    $changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docFname = '$docName'";
    setData($changeDocQueue);
}


//$rowDocQueue = getData($selectDocQueue);
//$docQueue = $rowDocQueue[0]['docQueue'];
//echo($docQueue);


 


//Finally Insert into WaitingList relation
$insertPatWaitingList = "INSERT INTO waitinglist(docId, patId, listStatus) VALUES('$docId', '$nurseId', '$patId', NOW(), '$listStatus')";
setData($insertPatWaitingList);

echo($docId." ");
echo($nurseId." ");
echo($patId." ");
echo($listStatus." ");

//Redirect to patView Appointment Page------dash1.php
header("Location:dash2.php");

?>