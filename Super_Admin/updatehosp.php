<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Hospital</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="nurseStyle.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Patient per Day'],
          ['Medicine1',     11],
          ['Medicine2',      2],
          ['Medicine3',  2],
          ['Medicine4', 2],
          ['Medicine5',    7]
        ]);

        var options = {
          title: 'Medicine Quantities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
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
    </head>
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
 
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="docs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Manage Doctors</a>
    <a href="nurses.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Manage Nurses</a>
    <a href="pats.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i> Manage Patients</a>
    <a href="ambs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i> Manage Ambulances</a>
    <a href="pharms.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i> Manage Pharmacist</a>
    <a href="hosps.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Manage Hospitals</a>
    <a href="pat-reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Create Patient</a>
    <a href="hosp-reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Create Hospital Admin</a>
    <a href="amb-reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Create Ambulance</a>
    <a href="pharm-reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Create Pharmacist</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:10px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:15px">
    <h5><b> Updating Hospital</b></h5>
  </header>
    
  

  <div class="w3-row-padding w3-margin-bottom">



 
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

  <div class="w3-twothird">
        <h4>Update Hospital</h4>
        <table class="w3-table w3-striped w3-pale-blue">
        <tr>


        <th>Hospital Id</th>
      <th>Hospital Name</th>
      <th>Hospital Address</th>
      <th>Opening Hours</th>
      <th>Closing Hours</th>
      <th>Admin Name</th>
      <th>Admin Email</th>
      <th>Latitude</th>
      <th>Longitude</th>
        
      

        </tr>
         
<?php

require_once "dbConnection.php";
$link = connect();
if(isset($_POST["hospId"])){
$hospId = $_POST["hospId"];
$query = "SELECT hospId, hospName, hospAddress, hospOpeningHrs, hospClosingHrs, hospAdmin, adminEmail, hospLat, hospLong FROM `hospital` WHERE hospId = '$hospId' ";
$result = $link->query($query);

while ($row = $result->fetch_assoc()){


	
	
echo ("
<tr class='w3-pale-blue'>


<td>".$row['hospId']."</td>
<td>".$row['hospName']."</td>
<td>".$row['hospAddress']."</td>
<td>".$row['hospOpeningHrs']."</td>
<td>".$row['hospClosingHrs']."</td>
<td>".$row['hospAdmin']."</td>
<td>".$row['adminEmail']."</td>
<td>".$row['hospLat']."</td>
<td>".$row['hospLong']."</td>


</tr> 

");





echo("
        </table>
      </div>

      </div>

 
      <h3>Update Hospital Here</h3>
        <table class='w3-table w3-striped w3-white'>
        <tr>
    
      
        <th>Hospital Name</th>
        <th>Hospital Address</th>
        <th>Opening Hours</th>
        <th>Closing Hours</th>
        <th>Admin Name</th>
        <th>Admin Email</th>
        <th>Latitude</th>
        <th>Longitude</th>

    
      
    
        <th>Action</th>
        </tr>
         
");


	
echo ("
 
<tr>
<form action ='updatehospPr.php' method='post' >

<td>
<input type = 'text' class='form-control'    name = 'hospName' placeholder='edit'/>
</td>

<td>
<input type = 'text' class='form-control'  name = 'hospAddress'  placeholder='edit'/>
</td>

<td>
<input type = 'time' class='form-control'  name = 'hospOpeningHrs' placeholder='edit' />
</td>

<td>
<input type = 'time' class='form-control'  name = 'hospClosingHrs' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'hospAdmin' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'adminEmail' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'hospLat' placeholder='edit' />
</td>

<td>
<input type = 'text' class='form-control'  name = 'hospLong' placeholder='edit' />
</td>



<td>

<input type = 'submit' class='btn btn-primary'  name = 'save' value = 'Save'/>
<input type = 'hidden' name = 'hospId' value = '".$row['hospId']."'/>
</td>
</form>	
</tr>

");


}
}
?>
        </table>




  </div>




  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
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
