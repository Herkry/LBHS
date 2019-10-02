<?php
//Get SQL Functions
require("sqlFunctions.php");

//Get DB parameters
$patId = 1;

// Check if patient status makes them eligible to view medicine theyve been allocated//
//Check whether submit button was clicked
if (isset($_POST["submit"])){
    //Select listStatus of patient from WaitingList table
    $selectPatListStatus = "SELECT listStatus FROM waitinglist WHERE patId = '$patId'";
    $rowPatListStatus = getData($selectPatListStatus);
    $listStatus = $rowPatListStatus[0]['listStatus'];

    //Check if listStatus allows patient to navigate to pharmacy page
    if($listStatus == "On Nurse Queue"){
        //Redirect to patMedView Page------I am yet to get page name
        header("Location:userOrderPayment.php");

    }
    else{
        //Redirect to patApptView Appointment Page------I am yet to get page name
        header("Location:userOrderPayment.php");
    }

}







?>
