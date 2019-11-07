<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require('dbConnection.php');

//Get SQL Functions
$link = connect();



// get the docName parameter from Map and patientId from  SESSION VARIABLE, and other DB parameters
if (isset($_POST['submit'])) {
  
$ambNoPlate= $_POST['submit'];


//echo($ambNoPlate);
//$patId = $_POST["patId"];
//echo("<script>window.alert('Harry');<script>");



$patId = $_SESSION["id"];
$ambListStatus = "In session";


$selectAmbId = "SELECT ambId FROM ambulance WHERE ambNoPlate = '$ambNoPlate'";
$result1 = $link->query($selectAmbId);




//$docId = 0;
//$hospId = 0;
while ($row = $result1->fetch_assoc()){

    $ambId = $row['ambId'];

    // Checker 
    $checker = mysqli_query($link, "SELECT ambWaitListId FROM ambWaitinglist WHERE patId = '$patId' AND ambListStatus = '$ambListStatus' ");
    if(mysqli_num_rows($checker)==0){
        $insertPatAmbWaitingList = "INSERT INTO ambwaitinglist(ambId, patId, ambListStatus, ambAppointmentDate) VALUES('$ambId', '$patId', '$ambListStatus', now())";
        setData($insertPatAmbWaitingList);

        //Changing status of ambulance in ambulance relation
        $ambStatus = "In session";
        $changeAmbStatus= "UPDATE ambulance SET ambStatus = '$ambStatus' WHERE ambNoPlate = '$ambNoPlate'";
        setData($changeAmbStatus);

        header("Location:emergency2.php");
        
        
        
        
        
        // $selectDocQueue = "SELECT docQueue FROM doctor WHERE docFname = '$docName'";
        // $result2 = $link->query($selectDocQueue);
        // //$docQueue = 0;
        // while ($row = $result2->fetch_assoc()){
        //       $docQueue = $row['docQueue'];

        //       $docQueue = trim($docQueue + 1);

        //       $changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docFname = '$docName'";
        //       setData($changeDocQueue);

        //       //header("Location:dash2.php");

        // }
    }
    else{
       

        echo'<script>'.'alert("Impossible action. You have already a pending appointment"); window.location.replace("home.php");'.'</script>';

    }

}

}

?>