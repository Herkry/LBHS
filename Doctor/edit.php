<?php
//SELECTING FROM WAITING LIST ONLY ONE PATIENT WHO IS TO BE SEEN BY DOC
//Require
require("sqlFunctions.php");

//Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
$link = connect();
//Defining DB variables
$docId = $_SESSION["id"];
$listStatus = "doctor session";

//Selecting from waitlingList relation WHERE listStatus = Appropriate---Only one patient is selected
$selectPatWaitListId = "SELECT patId FROM waitingList WHERE docId = '$docId' AND listStatus = '$listStatus'";
$rowPatId = getData($selectPatWaitListId);

//TEST
//echo("<pre>");
//print_r($rowPatId);
//echo("</pre>");

//Get info of patient selected from DB
//Declare rowPatDetails array to store patient details
$rowPatDetails = array();

//Get the patDetails from the patients relation----Only one patient is selected
$patId = $rowPatId[0]["patId"];
$selectPatDetails = "SELECT * FROM patient WHERE patId = '$patId'";
$rowPatDetails = getData($selectPatDetails);   

//Selecting past medicalHistory of patient
//Get the patDetails from the patients relation----Only one patient is selected
$patId = $rowPatId[0]["patId"];
$selectPatMedHist = "SELECT * FROM medicalrecords WHERE patId = '$patId'";
//---$rowPatMedHist = getData($selectPatMedHist); 


//NOT DONE HERE
//Selecting doctor names of doctors who treated the patients

//Selecting hospitals where patient was treated


//require_once "dbConnection.php";
$link = connect();
?>




<!DOCTYPE html>
<html>
<title>Doctor Edit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="nurseStyle.css">
<link rel="stylesheet" type='text/css' href="statStyle.php" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
<body class="w3-light-grey">
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        #constant{
      background-color: white;
      height: 100%;
      padding: 0%;
	  }
	      .navbar {
    
     
      font-family: "Angsana New", Angsana, serif;
      font-size:20px;

    }
    footer {
	  background-color: #0A0A2A;
      padding: 25px;
	  height: 2px;
    }
	</style>
	<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare

  </div>

</div>



<!-- Top container -->



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>




<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; color:white; background-color:black;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <img src= "profile.png" class="w3-circle w3-margin-right" style="width:46px"/>
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></span><br>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-dashboard"></i> Patient</b></h3>
  </header>

     
  <div class="w3-row-padding w3-margin-bottom">
  <?php
          
      

         $checker0 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE docId = '$docId'");
         $res0 = mysqli_num_rows($checker0);
         $status1 = "awaiting doctor";
         $checker1 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE docId = '$docId' AND `listStatus`= '$status1'");
         $res1 = mysqli_num_rows($checker1);
          
     ?>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $res1; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Patient Queue</h4>
      </div>
    </div>
  </div>
 

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

      <div class="w3-twothird">
        <h4>Patient Information</h4>
        <table class="w3-table w3-striped w3-white">

         
<?php

//require_once "dbConnection.php";
//$link = connect();
//$username = $_SESSION["username"];



?>
        </table>
        <!--Doctor views past medical history of patient-->
        <h5>Past Medical History</h5>
        <table class="w3-table w3-striped w3-pale-blue">

          <tr>
            <th>Record ID</th>
            <th>Date Created</th>
            <th>Temperature</th>
            <th>Blood Pressure</th>
            <th>Glucose Level</th>
            <th>BMI</th>
            <th>Symptoms</th>
            <th>Illness</th>
            <th>Medicine Name</th>
            <th>Intake Instructions</th>
            <th>Doctor Note</th>
            <th>Doctor</th>
            <th>Hospital</th>
          </tr>


          <?php
           
            //NOT DONE HERE
            //----for($i = 0; $i < count($rowPatDetails); $i++ ){
              $result = $link->query($selectPatMedHist);

              while ($rowPatMedHist = $result->fetch_assoc()){
              echo("
                  <tr style='color:black;'>
                  <td>"
                  .$rowPatMedHist['medRecId']
                ."</td>
                  <td>"
                  .$rowPatMedHist['date_created']
                ."</td>
                <td>"
                  .$rowPatMedHist['temp']
                ."</td>
                <td>"
                  .$rowPatMedHist['bloodP']
                ."</td>
                <td>"
                  .$rowPatMedHist['glcLvl']
                ."</td>
                <td>"
                  .$rowPatMedHist['bmi']
                ."</td>
                <td>"
                  .$rowPatMedHist['symptoms']
                ."</td>
                <td>"
                  .$rowPatMedHist['illness']
                ."</td>
                <td>"
                  .$rowPatMedHist['medName']
                ."</td>
                <td>"
                  .$rowPatMedHist['intakeInstructions']
                ."</td>
                <td>"
                  .$rowPatMedHist['docNote']
                ."</td>
                </tr>
            
              ");
            
            }



          ?>
        </table>


        <h5>Doctor's Observation</h5>
        <table class="w3-table w3-striped w3-teal">
        <tr>

        <th>Indicate Illness</th>
        <th>Doctor's Note</th>
        <th>Medicine Name</th>
        <th>Intake Instructions</th>
        <th>Dosage Amount</th>
        <th></th>

        </tr>
         
<?php


	
echo ("
    <tr>
     <form method='post' action = 'editPr.php'>
    ");


for($i = 0; $i < count($rowPatDetails); $i++ ){
  echo("
  <input type = 'hidden' name = 'patId' value = '".$rowPatDetails[$i]["patId"]."'/>

  <td>
    <input type = 'text' class='form-control'  name = 'illness' placeholder='Patient Illness' />
    <!--Removed value attribute in tag as this is a input TEXT tag-->
  </td>

  <td>
    <input type = 'text' class='form-control'  name = 'docNote'  placeholder='Diagnosis' />
  </td>

  <td>
    <input type = 'text' class='form-control'  name = 'medName' placeholder='Medicine' />
  </td>

  <td>
    <input type = 'text' class='form-control'  name = 'intakeInstructions' placeholder='Intake Instructions' />
  </td>

  <td>
    <input type = 'text' class='form-control'  name = 'dosageAmt' placeholder='Intake Instructions' />
  </td>

  <td>
  <input type = 'submit' class='form-control'  name = 'submit' />
  </td>

  
");
}

echo("
    </form>	
    </tr>

    ");


//$oid = $_POST["orderid"];
//$pending ="pending";
//$sql1 = "UPDATE `clientorders` SET `statu`= 'completed' WHERE ID = '$oid'";
//setData($sql1);

?>
        </table>



      </div>
    </div>
  </div>


  <br>
  <div class="w3-container">
    <div class="w3-row">
    <footer class="container-fluid text-center">
       <p style="color:white;">Copyright © 2019 - Geolocation Based Healthcare Services(GBHS). All Rights Reserved.</p>
        </footer>

    </div>
  </div>

  <!-- Footer -->


  <!-- End page content -->
</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect  
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    overlayBg.style.display = "none";
    }
</script>

</body>
<!--Add Button for Submitting to edit.php-->
</html>


