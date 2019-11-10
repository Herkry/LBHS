<?php
require("sqlFunctions.php");
//IN THIS PAGE WE WILL SELECT MEDICINE MEANT FOR PATIENTS AND SUGGEST A PHARMACT MEANT FOR THEM


//Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// $patId = $_SESSION["id"];

// //----Check whether patient is in an active hospital session at the moment
// //------Select from waiting list relation to check the listStatus

// require_once "dbConnection.php";
// $link = connect();


// $selectWaitlistStatus = "SELECT listStatus FROM waitinglist WHERE patId = '$patId' AND listStatus = 'awaiting medication'";
// $rowWaitlistStatus= getData($selectWaitlistStatus); 

// //Check whether $rowWaitlistStatus is empty
// if(empty($rowWaitlistStatus)){
//   echo("
//         <script>
//             window.alert('You have not seen the doctor yet so no prescription is available at the moment');
//         </script>
//   ");

//   header("Location: home.php");
// }


// //Define DB Variables
// $patId = $_SESSION["id"];
// $listStatus = "awaiting medication";

// //Selecting From medicalHistory where listStatus = 'awaiting medication'-------Only one medName is selected(of this specific patient)
// $selectMedAllocated = "SELECT medName, medDosageAmt FROM medicalrecords WHERE patId = '$patId' AND listStatus = '$listStatus'";
// $rowMedAllocated = getData($selectMedAllocated); 

// //Select from medicine DB details of the  medName allocated is as in $rowMedAllocated[0]['medname'], and medicine exists
// $selectMedAllocatedDetails = "SELECT * FROM medicine WHERE medName = '$rowMedAllocated[0]['medname']' AND medTotAmt >= '$rowMedAllocated[0]['medDosageAmt']' ORDER BY medUnitPrice ASC ";
// $rowMedAllocatedDetails = getData($selectMedAllocatedDetails);

// //Check whether $rowMedAllocatedDetails is empty
// if(empty($rowMedAllocatedDetails)){
//     echo("
//           <script>
//               window.alert('No pharmacy found with the requested medication dosage');
//           </script>
//     ");

//     header("Location: home.php");
// }

// else

// //Calculate price patient will pay for every paharmacy on list
// //Declare array patPharmTotMedCharge which is ordered as the rowMedAllocatedDetails which stores the pharmacy details and total charges for patient
// $patPharmTotMedCharge = array();

// //Declaring some patient variables here
// $patMedDosageAmt = $rowMedAllocated[0]['medDosageAmt'];


// for($i = 0; $i < $rowMedAllocatedDetails; $i++){
//     $totMedCharge = ($patMedDosageAmt/$rowMedAllocatedDetails[$i]["medUnitAmt"]) * $rowMedAllocatedDetails[$i]["medUnitPrice"];
    
// } 






//Define DB Variables
$patId = $_SESSION["id"];
$medRecStatus = "awaiting medication";

//Selecting From medicalHistory where listStatus = 'awaiting medication'-------Only one medName is selected(of this specific patient)
$selectMedAllocated = "SELECT medName, medDosageAmt FROM medicalrecords WHERE patId = '$patId' AND medRecStatus = '$medRecStatus'";
$rowMedAllocated = getData($selectMedAllocated); 

//Select from medicine DB details of the  medName allocated is as in $rowMedAllocated[0]['medname'], and medicine exists
$rowMedAllocatedName = $rowMedAllocated[0]['medName'];
$rowMedAllocatedDosageAmount = $rowMedAllocated[0]['medDosageAmt'];
$selectMedAllocatedDetails = "SELECT * FROM medicine WHERE medName = '$rowMedAllocatedName' AND medTotAmt >= '$rowMedAllocatedDosageAmount' ORDER BY medUnitCharge ASC ";
$rowMedAllocatedDetails = getData($selectMedAllocatedDetails);//rowMedAllocatedDetails = getData($selectMedAllocatedDetails);

//Check whether $rowMedAllocatedDetails is empty
if(empty($rowMedAllocatedDetails)){
    echo("
          <script>
              window.alert('No pharmacy found with the requested medication dosage');
              location.replace('prescription.php');
          </script>
    ");

    
    //header("Location: home.php");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Calculate price patient will pay for every pharmacy on list
//Declare array patPharmTotMedCharge which is ordered as the rowMedAllocatedDetails and which stores the pharmacy details and total charges for patient
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
      height:200px;

    
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
     padding-top:7px;
     text-align: center;
    
     font-size:20px;
     border: 1px solid;
     
    
    
}

.notification {


position: relative;


}

.notification:hover {
background: red;
}

.notification .badge {
position: absolute;
top: -10px;

padding: 5px 10px;
border-radius: 50%;
background-color: red;
color: white;
}


		footer {
            margin-top:20px;
	  background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      padding: 25px;
	  height: 100px;
    }



    #label1{
      color: #CB4335; 
      font-family: Angsana New, Angsana, 
      serif; font-size:25px;
    }
    #logo{
      height="70";
      width="70";

    }
    #session{
      margin: 10px; 
      float: right; 
      margin-left: 100px; 
      padding-top:1px;
      text-align: center; 
      color: #626567; 
      font-family: 'Angsana New', Angsana, serif; 
      font-size:20px;
    }
    #profile-pic{
      margin-right:10px;
      height="50";
      width="50";
    }

    @media (min-width: 600px) {

            
    }



	
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1">
      <img id="logo" height="70" width="70"   src="logo.png" />
	  Geolocation Based Healthcare
    <div id="session"><img src= "profile.png" id="profile-pic"  height="50" width="50"/><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
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
        <li><a href="dash2.php" class="notification"  style="color: white;"><span>Appointments</span><span class="badge"><?php $linker = connect(); $patId = $_SESSION["id"]; $listStatus = "Being Assisted"; $checker = mysqli_query($linker, "SELECT waitListId FROM waitinglist WHERE patId = '$patId' AND listStatus = '$listStatus' "); $checks = mysqli_num_rows($checker);  echo($checks)?></span></a></li>
        <li class="active"><a href="prescription.php" class="notification"  style="color: white;"><span>Prescription</span><span class="badge">1</span></a></li>
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
              Pharmacies
          </div>
         
          <?php 
  
          for($i = 0; $i < count($pharmNames); $i++ ){//for loop start
          
          ?>
         
                   
            <div id="label3">
                
                <div id="sublabel32">
                    Pharmacy Name:   <?php echo($pharmNames[$i])?>                <br>
                    Cost:            <?php echo($patPharmTotMedCharge[$i])?>      <br>
                </div>
  
                <div id="sublabel33">
                  <form action = "buy1.php" method = "POST">
                    <!-- <a href="buy1.php" style="color: #FDFEFE">Request Pharmacy</a> -->
                    <input type = "hidden" name = "pharmName" value = "<?php echo($pharmNames[$i]) ?>"> 
                    <input type = "hidden" name = "medCost" value = "<?php echo($patPharmTotMedCharge[$i]) ?>">
                    <input style = "color: #FDFEFE" type = "submit" name = "Select" value = "Select" class="btn btn-primary"  >
                  </form>
                </div>
            
            </div>
             
             <!-- <div id="label3">
              <div id="sublabel32">
              Pharmacy Name:<br>Medicine Price:<br>Working hours:<br>
           
          </div>
          <div id="sublabel33">
  
           
               <a href="buy1.php" style="color: #FDFEFE">Request Pharmacy</a>
           
  
           
          </div>
             </div>
             
             <div id="label3">
          <div id="sublabel32">
              Pharmacy Name:<br>Medicine Price:<br>Working hours:<br>
           
          </div>
          <div id="sublabel33">
  
           
               <a href="buy1.php" style="color: #FDFEFE">Request Pharmacy</a>
           
  
           
          </div>
         </div> -->
  
          <?php 
  
            }//for loop end
  
          ?>
  
  
         </div>
         <!--To Here-->
  

       <!--The footer is here-->
		  
</body>
</html>