

<?php
//

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Require
require("sqlFunctions.php");

//Selecting from Waiting list relation where listStatus =  APPROPRIATE
//Defining DB parameters
$ambId =  $_SESSION["id"];
$ambListStatus = "In session";

//echo($ambId);

//Running Query to select from waitingList 
$selectPatAmbWaitListIds = "SELECT patId FROM ambwaitingList WHERE ambId = '$ambId' AND ambListStatus = '$ambListStatus'";
$rowPatIds = getData($selectPatAmbWaitListIds);


//TEST
// echo($docId);
// echo("<pre>");
//print_r($rowPatIds);
// echo("</pre>");

//Declare array to store all the patDetails from the patIds selected in the above query
$rowPatDetails = array();

//Get the patDetails from the patients relation
for($i = 0; $i < count($rowPatIds); $i++){
    $patId = $rowPatIds[$i]["patId"];
    $selectPatDetails = "SELECT * FROM patient WHERE patId = '$patId'";
    $rowPatDetails[$i] = getData($selectPatDetails);   
}
//Array rowPatDetails contains the details of the patients allocated to a specific doctor
//DOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


?>










<!DOCTYPE html>
<html>
<title>Doctor Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="nurseStyle.css">
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
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Queue</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Recent Patients</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  

      
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

      <div class="w3-twothird">
      <h4>Patients</h4>
      <table class="w3-table w3-striped w3-white">
        <tr>

        <tr>
        <th></th> 
        <th>Patient Name</th>
        <th>Patient DOB</th>
        <th>Patient Phone</th>
        <th>Patient Email</th>
        <th></th>

</tr>

        </tr>
         
<?php


/*
require_once "dbConnection.php";
$link = connect();
$username = $_SESSION["username"];

$query1 = "SELECT medRecId, docNote, illness, date_created, docName, patId FROM `medicalrecords` ";
$result = $link->query($query1);

while ($row = $result->fetch_assoc()){

	
	
	
echo ("
<tr class='w3-pale-blue'>
<td><i class='fa fa-user w3-text-blue w3-large'></i></td>
<td>".$row['medRecId']."</td>
<td>".$row['docNote']."</td>
<td>".$row['illness']."</td>

<td>".$row['date_created']."</td>
<td>".$row['docName']."</td>
<td>".$row['patId']."</td>
<td>
<form action='docAction.php' method='post'>
<input type = 'hidden' name = 'orderid' value = '".$row['ID']."'/>
<input type = 'submit' class='btn btn-primary'  name = 'complete' value = 'consult'/>
</form>	
</td>
</tr> 

");
}
*/

foreach ($rowPatDetails as $row){
  echo ("
    <tr class='w3-pale-blue'>
    <td><i class='fa fa-user w3-text-blue w3-large'></i></td>
    <td>".$row[0]['patFname']."</td>
    <td>".$row[0]['patDOB']."</td>
    <td>".$row[0]['patPhone']."</td>
    <td>".$row[0]['patEmail']."</td>

    <td>
    <form action='dashboardPr.php' method='post'>
      <input type = 'hidden' name = 'patInSessionId' value = '" .$row[0]['patId'] ."'/>
      <input type = 'submit' class='btn btn-primary'  name = 'Session Completed' value = 'Session Completed'/>
    </form>	
    </td>

    </tr> 

");

}

?>
        </table>
      </div>
    </div>
  </div>

  
    <hr>
  

  <hr>



  <br>
 

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
</html>



