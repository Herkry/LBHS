<?php
//BELOW IS THE CODE FOR SUBMITTING PATIENT DATA TO DB WHEN PATIENT IS SEEN BY DOCTOR ONCLICK DONE
//Require
require("sqlFunctions.php");

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Getting SESSION
$ambId =  $_SESSION["id"];

//Getting patName, etc from form
$patId  = $_POST["patInSessionId"];
echo($ambId);
echo($patId);
// $illness = $_POST["illness"];
// $docNote = $_POST["docNote"];
// $medName = $_POST["medName"];
// $intakeInstructions = $_POST["intakeInstructions"];

//Getting DB parameters
$ambId = $_SESSION["id"];
$oldAmbListStatus = "In session";
$newAmbListStatus = "Done";
$oldAmbStatus = "In session";
$newAmbStatus = "available";

// $status = "awaiting doctor";

//Changing WaitlingList status of patient
//Update MedRecords Relation
//Reduce docQueue
//Redirect to prevPage-----edit.php



// //WE NEED TO ADD STATUS ATTRIBUTE TO MEDICAL RECORDS RELAION SO AS TO KNOW WHAT RCORD TO UPDATE----THEREFORE ADD STATUS ATTRIBUTE CHECK TO CODE BELOW
// //Update MedRecords Relation
// $updatePatMedRecords = "UPDATE medicalrecords SET docId = '$docId', illness =  '$illness', docNote = '$docNote', medName = '$medName', intakeInstructions = '$intakeInstructions' WHERE patId = '$patId' AND waitinglist.listStatus = '$status' ";
// setData($updatePatMedRecords);

//Changing WaitlingList status of patient
$updatePatAmbWaitingList = "UPDATE ambWaitingList SET ambListStatus =  '$newAmbListStatus' WHERE patId = '$patId' AND ambListStatus = '$oldAmbListStatus'";
setData($updatePatAmbWaitingList);

//Update ambulance status to available
$updateAmbStatus = "UPDATE ambulance SET ambStatus =  '$newAmbStatus' WHERE ambId = '$ambId' AND ambStatus = '$oldAmbStatus'";
setData($updateAmbStatus);


//Return doctor to dashboard.php
//header("Location: dashboard.php");

?>
