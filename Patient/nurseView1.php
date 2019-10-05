<?php
//Selecting ALL the patients on the waiting list on a certain doctor's queue//
//Getting DB parameters- nurseId is gotten from SESSION variable
$nurseId = 1;
//$patIds CHECK

//Selecting patIds from WaitingList relation where nurseId = SESSION variable and listStatus = "On Nurse Queue"
$selectPatIds = "SELECT patId FROM waitinglist WHERE nurseId = '$nurseId";
$rowPatIds = getData($selectPatIds);

//Run for Loop so that for each patId we get their data
for($i = 0; $i < count($rowPatIds); $i++){
    //Selecting patInfo from DB
    $selectPatInfo = "SELECT patDOB, patAddress, patEmail, patFname, patLname, patPhone FROM waitinglist WHERE patId = '$rowPatIds[$i]['id']' ";
    $rowPatInfo = getData($selectPatInfo);
    //Can disply info now like...$rowPatInfo[$i]['patFname']
}





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>