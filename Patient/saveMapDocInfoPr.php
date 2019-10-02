<?php
//Get SQL Functions
require("sqlFunctions.php");

// get the docName parameter from Map and patientId from  SESSION VARIABLE, and other DB parameters
$docName = $_POST["submit"];
$docName = substr($docName, -5);
$patId = 1;
$listStatus = "On Nurse Queue";
//waitlistId CHECK
//registrationTime CHECK

//TEST
echo($docName);

//Insert into WaitingList relation and update Doc queue//

//First select docId from doctors table
$selectDocId = "SELECT docId FROM doctor WHERE docFname = '$docName'";
$rowDocId = getData($selectDocId);
$docId = $rowDocId[0]['docId'];

//Then select nurseId from nurses table
$selectNurseId = "SELECT nurseId FROM nurse WHERE docId = '$docId'";
$rowNurseId = getData($selectNurseId);
$nurseId = $rowNurseId[0]['nurseId'];


//Update docQueue by 1//
//First select docQueue from DB 
$selectDocQueue = "SELECT docQueue FROM doctor WHERE docFname = '$docName'";
$rowDocQueue = getData($selectDocQueue);
$docQueue = $rowDocQueue[0]['docQueue'];
echo($docQueue);

//Update docQueue by adding 1
$docQueue = $docQueue + 1;

//Update Doctor relation with updated docQueue
$changeDocQueue = "UPDATE doctor SET docQueue = '$docQueue' WHERE docFname = '$docName'";
setData($changeDocQueue); 


//Finally Insert into WaitingList relation
$insertPatWaitingList = "INSERT INTO waitinglist(docId, nurseId, patId, registrationTime, listStatus) VALUES('$docId', '$nurseId', '$patId', NOW(), '$listStatus')";
setData($insertPatWaitingList);

echo($docId." ");
echo($nurseId." ");
echo($patId." ");
echo($listStatus." ");

//Redirect to patView Appointment Page------dash1.php
header("Location:dash2.php");

?>