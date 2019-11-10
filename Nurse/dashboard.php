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
<title>Nurse Dashboard</title>
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
  
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

  <div class="w3-row-padding w3-margin-bottom">


  <?php
          $query = "SELECT hospId FROM `nurse` WHERE nurseId = '$nurseId' ";
          $res = $link->query($query);
          while ($r = $res->fetch_assoc()){
          
          $hospId = $r['hospId'];

         $checker0 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId'");
         $res0 = mysqli_num_rows($checker0);
         //$status1 = "awaiting doctor";
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
        <h4>Queued Patients</h4>
      </div>
    </div>
  </div>
  
    <hr>
  <div class="w3-container">
  <p style="margin-left:20px;">Served Patients</p>
    <div class="w3-grey" style="margin-left:20px;">
    <?php
       $query = "SELECT hospId FROM `nurse` WHERE nurseId = '$nurseId' ";
       $res = $link->query($query);
       while ($r = $res->fetch_assoc()){
       
         $hospId = $r['hospId'];
       $status1 = "awaiting doctor";
       $status0 = "Being Assisted";
       $checker0 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId' AND `listStatus`= '$status0'");
       $checker1 = mysqli_query($link,"SELECT waitListId FROM `waitinglist` WHERE hospId = '$hospId' AND `listStatus`= '$status1'");
       $res0 = mysqli_num_rows($checker0);
       $res1 = mysqli_num_rows($checker1);
       $tot = $res0 + $res1;
       if($tot!=0){
       $stat1 = ($res1*100)/$tot;
       $stat0 = ($res0*100)/$tot;
      echo("<div id ='stat1' class='w3-container w3-center w3-padding w3-green'>".$stat1."%"."</div>");
       
    ?>
    </div>
    <p style="margin-left:20px;">Remaining Patients</p>
    <div class="w3-grey" style="margin-left:20px;">
      <div   id ='stat0'     class="w3-container w3-center w3-padding w3-red"><?php echo($stat0); }}?>%</div>
    </div>
  </div>
  <hr>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

      <div class="w3-twothird">
        <h4>Patients</h4>
        <table class="w3-table w3-striped w3-white">
        <tr>

        <th>Patient</th>
        <th>Patient ID</th>
        <th>Doctor Name</th>
        <th>Specialty</th>
        <th>Queue</th>
        <th>Edit</th>

        </tr>
         
<?php


$listStatus = "Being Assisted";
$query = "SELECT hospId FROM `nurse` WHERE nurseId = '$nurseId' ";
$res = $link->query($query);
while ($r = $res->fetch_assoc()){

  $hospId = $r['hospId'];

  $q = "SELECT patId, docId FROM `waitinglist` WHERE hospId = '$hospId' AND listStatus = '$listStatus' ";
  $res2 = $link->query($q);
  while ($r2 = $res2->fetch_assoc()){

    $docId = $r2['docId'];
    $patId = $r2['patId'];

$query1 = "SELECT docLname, docSpecialty, docQueue FROM `doctor` WHERE docId = '$docId' ";
$result = $link->query($query1);

while ($row = $result->fetch_assoc()){

	
	
	
echo ("
<tr>
<td><i class='fa fa-user w3-text-blue w3-large'></i></td>
<td>".$patId."</td>
<td>".$row['docLname']."</td>
<td>".$row['docSpecialty']."</td>
<td>".$row['docQueue']."</td>

<td>
<form action='edit.php' method='post'>
<input type = 'hidden' name = 'patId' value = '".$patId."'/>
<input type = 'submit' class='btn btn-primary'  name = 'complete' value = 'consult'/>
</form>	
</td>
</tr> 

");
}
  }
}



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
