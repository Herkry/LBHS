<?php
require("sqlFunctions.php");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}




//Define DB Variables
$patId = $_SESSION["id"];
$medRecStatus = "awaiting medication";

//Selecting From medicalHistory where listStatus = 'awaiting medication'-------Only one medName is selected(of this specific patient)
$selectMedAllocated = "SELECT medName, medDosageAmt, intakeInstructions FROM medicalrecords WHERE patId = '$patId' AND medRecStatus = '$medRecStatus'";
$rowMedAllocated = getData($selectMedAllocated); 

//print_r($rowMedAllocated);

//Select from medicine DB details of the  medName allocated is as in $rowMedAllocated[0]['medname'], and medicine exists
$rowMedAllocatedName = $rowMedAllocated[0]['medName'];
$rowMedAllocatedDosageAmount = $rowMedAllocated[0]['medDosageAmt'];
$selectMedAllocatedDetails = "SELECT * FROM medicine WHERE medName = '$rowMedAllocatedName' AND medTotAmt >= '$rowMedAllocatedDosageAmount' ORDER BY medUnitCharge ASC ";
$rowMedAllocatedDetails = getData($selectMedAllocatedDetails);

//Check whether $rowMedAllocatedDetails is empty
if(empty($rowMedAllocatedDetails)){

    echo("

          <script>
              window.alert('No pharmacy found with the requested medication dosage');
              window.location.replace('prescription.php');
          </script>
          

    ");

    //header("Location: home.php");
    //echo("Done");
}


else{
//Changing status of patient relation
//Updating waitingList
//$updatePatStatus = "UPDATE waitingList SET listStatus = 'seen pharmacist' WHERE patId = '$patId' ";
//setData($updatePatStatus);

//Updating medicalRecords relation
//$updatePatStatus = "UPDATE medicalrecords SET medRecStatus = 'seen pharmacist' WHERE patId = '$patId' ";
//setData($updatePatStatus);


//Calculate price patient will pay for every pharmacy on list
//Declare array patPharmTotMedCharge which is ordered as the rowMedAllocatedDetails which stores the pharmacy details and total charges for patient
$patPharmTotMedCharge = array();

//Declaring some patient variables here
$patMedDosageAmt = $rowMedAllocated[0]['medDosageAmt'];


for($i = 0; $i < count($rowMedAllocatedDetails); $i++){
    $totMedCharge = $patMedDosageAmt * $rowMedAllocatedDetails[$i]["medUnitCharge"];
    $patPharmTotMedCharge[$i] =  $totMedCharge;
}

//Selecting pharm names according to the pharmIds in $rowMedAllocatedDetails array, array will be ordered same as rowMedllocatedDetails array and $patPharmTotMedCharge array as well

//Declaring array to hold pharmacy names
$pharmNames = array();

for($i = 0; $i < count($rowMedAllocatedDetails); $i++){
    //Selecting from pharmacist relation ONLY ONE record of the pharmId specified
    $rowMedAllocatedPharmId = $rowMedAllocatedDetails[$i]['pharmId'];
    $selectPharmDetails = "SELECT * FROM pharmacy WHERE pharmId = '$rowMedAllocatedPharmId' ";
    $rowPharmDetails = getData($selectPharmDetails);
    
    $pharmNames[$i] = $rowPharmDetails[0]["pharmName"];
    

}

//Finalising on the info selected-Getting details of the pharmacist selected
$pharmNameSelected = $_POST["pharmName"];
$medSelectedCost = $_POST["medCost"];

//Select from pharmacist relation where pharmName is as specified-- ONLY ONE record selected
$selectChosenPharmDetails = "SELECT * FROM pharmacy WHERE pharmName = '$pharmNameSelected' ";
$rowChosenPharmDetails = getData($selectChosenPharmDetails);


//Insert into pharmRequests relation
//Select medId from medicine relation where pharmId = $rowChosenPharmDetails[0]['pharmId'] and medName = $rowMedAllocated[0]['medname']
$rowChosenPharmDetailsPharmId = $rowChosenPharmDetails[0]['pharmId'];
$rowMedAllocatedName = $rowMedAllocated[0]['medName'];
$selectMedId = "SELECT medId FROM medicine WHERE pharmId = '$rowChosenPharmDetailsPharmId' AND  medName = '$rowMedAllocatedName'";
$rowMedId = getData($selectMedId);

//Finally Insert
$rowMedIdOne = $rowMedId[0]['medId']; 

//Test
// echo($rowChosenPharmDetailsPharmId);
// echo("Hello");
$requestStatus = "awaiting pharmacist";
$insertPharmRequest = "INSERT INTO pharmacyrequests(medId, patId, pharmId, timeOfRequest, requestStatus) VALUES('$rowMedIdOne', '$patId', '$rowChosenPharmDetailsPharmId', NOW(), '$requestStatus') ";
setData($insertPharmRequest);



}









?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Prescription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
        body{ font: 14px sans-serif; }
        
		
		.wrapper{ width: 350px; padding: 20px; 
		margin: auto;
		
		border-radius: 25px;
		
		background-color: white;
	
		}
        #constant{
      background-color: white;
      height: 100%;
      padding: 0%;
	  }
	  #sublabel13{
	width:200px;
	height:20px;
	border:1px solid;
	margin: 10px;
	float: right;
	
	margin-left: 100px;
	padding-top:1px;
	text-align: center;
	color: #626567;
	font-family: "Angsana New", Angsana, serif;
    font-size:20px;
	border-radius: 25px;
}
    .navbar {
    
      background-image:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(myArt.jpg);
      font-family: "Angsana New", Angsana, serif;
      font-size:20px;

    }

		#back{
		
	
			padding-top: 0px;
        
			
		}
		
		#label3{
      height:300px;

    
	  margin-top:20px;
  
      }
  
   #sublabel31{
	    width:600px;
	    height:70px;
    
	    margin:auto;
        padding-top:15px;
	    font-size:30px;
	    font-family: "Angsana New", Angsana, serif;
	    color: white;
	    text-align:center;
	
	    border-radius: 25px;
	    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      }
   #sublabel32{
     width:600px;
	   height:150px;
       margin-top:20px;
       margin-bottom:20px;
     margin:auto;

     font-family:"Angsana New", Angsana, serif;
     font-size:22px;
     text-align: left;
    
     padding:30px;
     color:white;
     background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
    
     }

     #sublabel33{
     width:250px;
     height:50px;
     margin:auto;
     margin-top: 10px;
     padding-top:11px;
     text-align: center;
     font-family: "Angsana New", Angsana, serif;
     font-size:20px;
     border-radius: 25px;
     background-color: #CB4335;
    
}


.notification {
  background-color: #0B0B3B;
  color: white;
  text-decoration: none;
  margin-left: 15px;
  position: relative;
  display: inline-block;

}
.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}




		footer {
            margin-top:20px;
	  background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      padding: 25px;
	  height: 200px;
    }

  


	
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare
	  <div style="margin: 10px; float: right; margin-left: 100px; padding-top:1px; text-align: center; color: #626567; font-family: 'Angsana New', Angsana, serif; font-size:20px;"><img src= "profile.png" style="margin-right:10px;" height="50" width="50" /><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
  </div>

</div>
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
      <ul class="nav navbar-nav">
        <li  ><a href="home.php" style="color: white;">Home</a></li>
        <li><a href="dash2.php" class="notification"  style="color: white;"><span>Appointments</span><span class="badge">1</span></a></li>
        <li><a href="prescription.php" class="notification"  style="color: white;"><span>Prescription</span><span class="badge">1</span></a></li>
        <li><a href="emergency1.php"style="color: white;">Emergency</a></li>
        
        <li><a href="history.php"style="color: white;">Medical History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


		   
		   
		   		   <!--From Here-->
              <div id="back">
		      		   
                 <div id="sublabel31">
       
                    Get your Medicine
                 
                 </div>
                 
                 <div id="label3">
       
                   <div id="sublabel32">
       
                       Medicine Name:<?php echo($rowMedAllocated[0]["medName"]);?><br>
                       Dosage: <?php echo($rowMedAllocated[0]["medDosageAmt"]);?><br>
                       Instructions: <?php echo($rowMedAllocated[0]["intakeInstructions"]);?><br>
                       Cost: <?php echo($medSelectedCost); ?>
                   </div><br><br>
                 
                   <div id="sublabel32">
                       Pharmacy Name:  <?php echo($rowChosenPharmDetails[0]["pharmName"]);?>         <br>
                       Address:        <?php echo($rowChosenPharmDetails[0]["pharmAddress"]);?>      <br>
                       Email:          <?php echo($rowChosenPharmDetails[0]["pharmEmail"]);?>        <br>
                       Phone:          <?php echo($rowChosenPharmDetails[0]["pharmPhone"]);?>        <br>
                   </div>
       
                 </div>
       
              </div><br><br><br><br><br><br>
             <!--To Here-->

</body>
</html>