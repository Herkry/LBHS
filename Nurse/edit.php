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
$nurseId = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>
<title>Test Nurse</title>
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
          $query = "SELECT hospId FROM `nurse` WHERE nurseId = '$nurseId' ";
          $res = $link->query($query);
          while ($r = $res->fetch_assoc()){
          
          $hospId = $r['hospId'];

         $checker0 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId'");
         $res0 = mysqli_num_rows($checker0);
         $status1 = "Being Assisted";
         $checker1 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId' AND `listStatus`= '$status1'");
         $res1 = mysqli_num_rows($checker1);
          
     ?>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $res1; }?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Patient Queue</h4>
      </div>
    </div>
  </div>
 








  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

      <div class="w3-twothird">
        <h3>Medical History</h3>
        <table class="w3-table w3-striped w3-white">
        <tr>

        <th>Patient</th>
        <th>Temperature</th>
        <th>Historic ID</th>
        <th>Blood Pressure</th>
        <th>BMI</th>
        <th>Glucose Level</th>
        <th>Symptoms</th>
        <th>Date Created</th>
        <th>Patient ID</th>
        

        </tr>
         
<?php

require_once "dbConnection.php";
$link = connect();
$nurseId = $_SESSION["id"];
$patId = $_POST['patId'];
$listStatus = "Being Assisted";
//----$query = "SELECT hospId FROM `nurse` WHERE nurseId = '$nurseId' ";
//----$res = $link->query($query);

//---while ($r = $res->fetch_assoc()){

    //---$hospId = $r['hospId'];


    //-$q = "SELECT patId FROM `waitinglist` WHERE hospId = '$hospId' AND listStatus = '$listStatus' ";
    //-$res2 = $link->query($q);
    //-while ($r2 = $res2->fetch_assoc()){
      //-$patId = $r2['patId'];
  

      $query1 = "SELECT medRecId, temp, bloodP, bmi, glcLvl, symptoms, date_created, patId FROM `medicalrecords` WHERE patId = '$patId' ";
      $result = $link->query($query1);

         while ($row = $result->fetch_assoc()){

            echo ("
            <tr>
            <td><i class='fa fa-user w3-text-blue w3-large'></i></td>
            <td>".$row['medRecId']."</td>
            <td>".$row['temp']."</td>
            <td>".$row['bloodP']."</td>
            <td>".$row['bmi']."</td>
            <td>".$row['glcLvl']."</td>
            <td>".$row['symptoms']."</td>
            <td>".$row['date_created']."</td>
            <td>".$row['patId']."</td>
            
            </tr> 
            
            ");

          }
    //-}
//---}


?>
 </table>

        <h3>Edit Patient Medical History</h3>
        <table class="w3-table w3-striped w3-white">
        <tr>

    
        <th>Temperature</th>

        <th>Blood Pressure</th>
        <th>BMI</th>
        <th>Glucose Level</th>
        <th>Symptoms</th>
      
    
        <th>Save</th>

        </tr>
         
<?php


	
echo ("
 
<tr>
<form action='nurseAction.php' method='post' >

<td>
<input type = 'text' class='form-control'    name = 'temp' placeholder='edit'/>
</td>

<td>
<input type = 'text' class='form-control'  name = 'bloodP'  placeholder='edit'/>
</td>

<td>
<input type = 'text' class='form-control'  name = 'bmi' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'glcLvl' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'symptoms'  placeholder='edit' />
</td>


<td>
<input type = 'hidden' name = 'patId' value = '".$patId."'/>
<input type = 'submit' class='btn btn-primary'  name = 'save' value = 'Save'/>
</td>
</form>	
</tr>

");


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
</html>
