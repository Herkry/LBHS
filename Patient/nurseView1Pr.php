<?php
//Get SQL Functions
require("sqlFunctions.php");

//Get DB parameters- nurseId is gotten from SESSION variable
$nurseId = 1;
$listStatus = "Nurse Session";
//$patId CHECK
//$docId CHECK

// Check if submit buton is clicked
if (isset($_POST["submit"])){
    //Update patient WaitingList relation 
    //Get patId from WatingList relation
    $selectPatId = "SELECT patId FROM waitinglist WHERE nurseId = '$nurseId";
    $rowPatId = getData($selectPatId);
    $patId = $rowPatId[0]['patId'];

    //Get docId from Nurse relation
    $selectDocId = "SELECT docId FROM nurse  WHERE nurseId = '$nurseId";
    $rowDocId = getData($selectDocId);
    $docId = $rowDocId[0]['patId'];

    //Change Patient status on WaitingList relation
    $changePatListStatus = "UPDATE waitingList SET listStatus = '$listStatus' WHERE patId = '$patId' ";
    setData($changePatListStatus); 

    //Reduce Doctor Queue
    //First select docQueue from DB 
    $selectDocQueue = "SELECT docQueue FROM doctor WHERE docId = '$docId'";
    $rowDocQueue = getData($selectDocQueue);
    $docQueue = $rowDocQueue[0]['docQueue'];

    //Update docQueue by subtracting 1
    $docQueue = $docQueue - 1;

    //Update Doctor relation with updated docQueue
    $changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docId = '$docId'";
    setData($changeDocQueue);

    //Redirect to nurseView2 Page------I am yet to get page name
    header("Location:userOrderPayment.php");
}





?>
