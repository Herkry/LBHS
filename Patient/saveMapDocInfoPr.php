<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}




//Get SQL Functions
require("sqlFunctions.php");
$link = connect();



// get the docName parameter from Map and patientId from  SESSION VARIABLE, and other DB parameters
$docName = $_POST["submit"];
//$patId = $_POST["patId"];




$patId = $_SESSION["id"];
$listStatus = "Being Assisted";


$selectDocId = "SELECT docId, hospId FROM doctor WHERE docFname = '$docName'";

$result1 = $link->query($selectDocId);
//$docId = 0;
//$hospId = 0;
while ($row = $result1->fetch_assoc()){

    $docId = $row['docId'];
    $hospId = $row['hospId'];

    // Checker 
    $checker = mysqli_query($link, "SELECT waitListId FROM waitinglist WHERE patId = '$patId' AND docId = '$docId' OR hospId = '$hospId' AND listStatus = '$listStatus' ");
    if(mysqli_num_rows($checker)==0){
        $insertPatWaitingList = "INSERT INTO waitinglist(docId, patId, hospId, listStatus, appointment_date) VALUES('$docId', '$patId', '$hospId' ,'$listStatus', now())";
        setData($insertPatWaitingList);

        $selectDocQueue = "SELECT docQueue FROM doctor WHERE docFname = '$docName'";
        $result2 = $link->query($selectDocQueue);
        //$docQueue = 0;
        while ($row = $result2->fetch_assoc()){
              $docQueue = $row['docQueue'];

              $docQueue = trim($docQueue + 1);

              $changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docFname = '$docName'";
              setData($changeDocQueue);

              header("Location:dash2.php");

              }
    }
    else{
       

        echo'<script>', ' window.location.replace("home.php"); alert("You have already a pending appointment with this Hospital/Doctor");','</script>';

    }

}
//$rowDocId = getData($selectDocId);
//$docId = $rowDocId[0]['docId'];


//$hospId = $rowDocId[0]['hospId'];




//Update docQueue by 1//
//First select docQueue from DB 



//$rowDocQueue = getData($selectDocQueue);
//$docQueue = $rowDocQueue[0]['docQueue'];


//echo($docQueue);


 


//Finally Insert into WaitingList relation



//Redirect to patView Appointment Page------dash1.php


?>