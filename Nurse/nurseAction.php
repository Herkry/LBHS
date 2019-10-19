<?php

            // Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



    require_once "dbConnection.php";
    $link = connect();

    
// Processing form data when form is submitted
    $nurseId = $_SESSION["id"];
    $patId = $_POST['patId'];
    $temp = $_POST['temp'];
    $bloodP = $_POST['bloodP'];
    $bmi = $_POST['bmi'];
    $glcLvl = $_POST['glcLvl'];
    $symptoms = $_POST['symptoms'];


    // INSERT NEW PATIENT_RECORDS INTO DB
    $insertPatientRecords = "INSERT INTO medicalrecords (temp, bloodP, bmi, glcLvl, symptoms, date_created, patId, nurseId)
    VALUES ('$temp', '$bloodP', '$bmi', '$glcLvl', '$symptoms', now(), '$patId', '$nurseId')";
    setData($insertPatientRecords);

    // UPDATE PATIENT QUEUE STATUS
    $status = "awaiting doctor";
    $listStatus = "Being Assisted";
    $updatePatientQueue = "UPDATE `waitinglist` SET `listStatus`= '$status' WHERE patId = '$patId' AND `listStatus` = '$listStatus'";
    setData($updatePatientQueue);

    header("location: dashboard.php");
  

?>