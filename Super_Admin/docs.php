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
<title>Hospital Doctors</title>
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
          ['Doctor1',     11],
          ['Doctor2',      2],
          ['Doctor3',  2],
          ['Doctor4', 2],
          ['Doctor5',    7]
        ]);

        var options = {
          title: 'Doctor Productivity'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Patient per Day'],
          ['Nurse1',     11],
          ['Nurse2',      2],
          ['Nurse3',  2],
          ['Nurse4', 2],
          ['Nurse5',    7]
        ]);

        var options = {
          title: 'Nurse Productivity'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

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

    @media,
          {
          #piechart1{ margin-right:10px; }
          #piechart2{ margin-right:10px; }
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
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="w3-panel">
<div class="w3-row-padding" style="margin:0 -16px">

<div class="w3-twothird">
      <h4>Doctor List</h4>
      <table class="w3-table  w3-pale-blue">  
      <tr>
      <th>Doctor Id</th>
      <th>Hospital Id</th>
      <th>Doctor First Name</th>
      <th>Doctor Last Name</th>
      <th>Doctor Phone Number</th>
      <th>Doctor Specialty</th>
      <th>Doctor Email</th>
      <th>Doctor Queue</th>
      <th>Update Action</th>
      <th>Delete Action</th>
  
  

      </tr>
       
<?php

require_once "dbConnection.php";
$link = connect();


$query = "SELECT docId, docFname, docLname, docPhone, docSpecialty, docEmail, docQueue, hospId FROM `doctor`";
$result = $link->query($query);

while ($row = $result->fetch_assoc()){


  
  
echo ("
<tr class='w3-pale-blue'>

<td>".$row['docId']."</td>
<td>".$row['hospId']."</td>
<td>".$row['docFname']."</td>

<td>".$row['docLname']."</td>
<td>".$row['docPhone']."</td>
<td>".$row['docSpecialty']."</td>
<td>".$row['docEmail']."</td>
<td>".$row['docQueue']."</td>
<td>
<form action='updatedoc.php' method='post'>
<input type = 'hidden' name = 'docId' value = '".$row['docId']."'/>
<input type = 'submit' class='btn btn-primary'  name = 'edit' value = 'edit'/>
</form>	
</td>
<td>
<form action='' method='post'>
<input type = 'hidden' name = 'docId' value = '".$row['docId']."'/>
<input type = 'submit' class='btn btn-primary'  name = 'delete' value = 'delete'/>
</form>	
</td>
</tr> 

");
}




if(isset($_POST['delete'])){
    $docId = $_POST['docId'];
    $deleteData = "DELETE FROM doctor WHERE docId = '$docId'";
    setData($deleteData);
    echo("<script> window.location.replace('/LBHS/patMapAdmin.php'); </script>");
 }
 




?>
      </table>
    </div>

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
