<?php
require("sqlFunctions.php");
//Selecting DOC details to display to patient//
//Getting DB parameters- patId is gotten from SESSION variable
$patId = 1;
$listStatus = "On Nurse Queue";
//$docId CHECK

//Selecting docId from WaitingList relation where patId= SESSION variable AND listStatus= On nurse queue
$selectDocId = "SELECT docId FROM waitinglist WHERE patId = '$patId' AND '$listStatus' = 'On Nurse Queue'";
$rowDocId = getData($selectDocId);
$docId = $rowDocId[0]['docId'];

//Now select from doctors table all the relevant doc info
$selectDocInfo = "SELECT docFname, docLname, docPhone, docQueue, docSpecialty, docEmail FROM doctor WHERE docId = '$docId' ";
$rowDocInfo = getData($selectDocInfo);

//Run for Loop to display all docInfo
for($i = 0; $i < count($rowDocInfo); $i++){
	//eg rowDocInfo[$i]['docFname']
}

//TEST
echo("<pre>");
print_r($rowDocInfo);
echo("</pre>");

echo($rowDocInfo[0]["docFname"]);






// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appointments</title>
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
     border-radius: 25px;
     }

#sublabel33{
     width:250px;
     height:50px;
     margin-top:20px;
     margin-bottom:20px;
     margin:auto;
     padding-top:11px;
     text-align: center;
     font-family: "Angsana New", Angsana, serif;
     font-size:20px;
     border-radius: 25px;
     background-color: #CB4335;
    
    
}



		footer {
            margin-top:20px;
	  background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      padding: 25px;
	  height: 100px;
    }




	
    </style>
</head>
<body>  			
			
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
	  Geolocation Based Healthcare
	  <div id="sublabel13">
		  <img src= "profile.png" height="20" width="20" />
		  <?php //echo htmlspecialchars($_SESSION["username"]); ?>
	  </div>
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
        <li class="active"><a href="#" style="color: white;">Appointments</a></li>
        <li><a href="emergency1.php"style="color: white;">Emergency</a></li>
        <li><a href="prescription.php"style="color: white;">Prescription</a></li>
        <li><a href="history.php"style="color: white;">Medical History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


		   
		   
		   <div id="back">
		   
		           		   
		      <div id="sublabel31">
			      <?php echo("<p><b>See Dr. " .$rowDocInfo[0]["docFname"] ." " .$rowDocInfo[0]["docLname"] ."</b></p>");?>
              </div>
              
              <div id="label3">
			  <div id="sublabel32">
            Specialty:<?php echo("<p> " .$rowDocInfo[0]["docSpecialty"] ."</p>");?><br>
            Phone:<?php echo("<p> " .$rowDocInfo[0]["docPhone"] ."</p>");?><br>
            Email:<?php echo("<p> " .$rowDocInfo[0]["docEmail"] ."</p>");?><br>
            Queue:<?php echo("<p> " .$rowDocInfo[0]["docQueue"] ."</p>");?><br>
				 
			  </div>
			  
		   </div>
           
           <div id="label3">
			  <div id="sublabel32">
			      Name:<br>Distance:<br>Working hours:<br>
				 
			  </div>
			  <div id="sublabel33">

				 
				     <a href="dash2.php" style="color: #FDFEFE">Request Appointment</a>
				 

				 
			  </div>
           </div>
           
           <div id="label3">
			  <div id="sublabel32">
			      Name:<br>Distance:<br>Working hours:<br>
				 
			  </div>
			  <div id="sublabel33">

				 
				     <a href="dash2.php" style="color: #FDFEFE">Request Appointment</a>
				 

				 
			  </div>
		   </div>
		   </div>
		   <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
</body>
</html>
  