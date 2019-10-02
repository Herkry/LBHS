<?php
//Get SQL Functions
require("sqlFunctions.php");

//Get DB parameters- nurseId is gotten from SESSION variable
//bloodP, bmi, glcLvl and temp ONLY being taken
$nurseId = 1;
$listStatus = "Doctor Session";
$bloodP =$_POST["bloodP"];
$bmi =$_POST["bmi"];
$glcLvl =$_POST["glcLvl"];
$temp =$_POST["temp"];


// Check if submit buton is clicked
if (isset($_POST["submit"])){

    //Inserting Patient MedRecords into DB 
    //Get docId from Nurse relation
    $selectDocId = "SELECT docId FROM nurse WHERE nurseId = '$nurseId";
    $rowDocId = getData($selectDocId);
    $docId = $rowDocId[0]['patId'];

    //Get patId from WatingList relation
    $selectPatId = "SELECT patId FROM waitinglist WHERE nurseId = '$nurseId";
    $rowPatId = getData($selectPatId);
    $patId = $rowPatId[0]['patId'];


    //Insert into MedicalRecords relation(Partial Data, the rest will be filled later)
    $insertMedRecordsTime1 = "INSERT INTO medicalrecords (bloodP, bmi, glcLvl, temp, datecreated)
                              VALUES($bloodP, $bmi, $glcLvl, $temp, NOW())";
    setData($insertMedRecordsTime1);

    //Update Patient listStatus in DB
    $changePatListStatus = "UPDATE waitingList SET listStatus = '$listStatus' WHERE patId = '$patId'";
    setData($changePatListStatus); 

    //Redirect to docView Page------I am yet to get page name
    header("Location:userOrderPayment.php");
    
}







?>
