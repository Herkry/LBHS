<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require("sqlFunctions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Emergency</title>
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
      margin-bottom:20px;


    }

		#back{
		
	
			padding-top: 0px;
			
		}
		
		#label3{
      height:550px;
      padding-top: 30px;
   
	  margin-top:20px;
  
      }
      
      #details{
          width:200px;
        
		  display:inline;
		  padding-left:0px;
      
		  
		  
		  
		  
		}
  
   #sublabel31{
	    width:800px;
	    height:170px;
      float: bottom;
	    margin:auto;
      padding-top: 20px;
	    font-size:30px;
	    font-family: "Angsana New", Angsana, serif;
	    color: white;
	    text-align:left;
	    padding:30px;
      margin:20px;
	
	    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
      }
   #sublabel32{
     width:600px;
	   height:150px;
  
	   margin:auto;
	   margin-top: 30px;
     font-family:"Angsana New", Angsana, serif;
     font-size:25px;
     text-align: left;
    
     padding:30px;
     color:white;
     background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
     }



#label3{
      height:200px;

    
	  margin-top:0px;
  
      }
  
   #sublabel31{
	    width:350px;
	    height:40px;
      
	    margin:auto;
      padding-top:3px;
	  
	    font-family: "Angsana New", Angsana, serif;
	    color: white;
	    font-size:22px;
	
	  
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

  



        #map{
            height:500px;
            width:100%;
			padding:0px;
            margin-bottom:10px;
            margin-top:10px;
        }
		#details{
          width:200px;
        
		  display:inline;
		  padding-left:0px;
		  
		  
		  
		  
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
	  background-color: #0A0A2A;
      padding: 25px;
	  height: 2px;
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


    @media screen and (max-width: 800px) {

#search{
    width:200px;
    display:inline;
    padding-left:0px;
    }
#top-cont{
    border:1px solid;
    height:250px;
    margin:5px;
    padding:5px;
    width:80%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100%;
  

    }
.buttons{
    float:left;
    padding-top:10px;

    }
#specialist{
    float: left;
    margin-right:5px;
    padding-top:5px;
    width:100px;
    }
.navbar {
  
    font-family: "Angsana New", Angsana, serif;
    font-size:20px;
    margin-bottom:8px;
    background: rgba(0,0,0,0.8);

    }
#label1{
  font-size:0px;
}
#session{
  font-size:0px;
}

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
        <li><a href="prescription.php" class="notification"  style="color: white;"><span>Prescription</span><span class="badge"><?php $linker = connect(); $patId = $_SESSION["id"]; $listStatus1 = "awaiting medication"; $checker = mysqli_query($linker, "SELECT waitListId FROM waitinglist WHERE patId = '$patId' AND listStatus = '$listStatus1' "); $checks = mysqli_num_rows($checker);  echo($checks)?></span></a></li>
        <li class="active"><a href="#"style="color: white;">Emergency</a></li>
        
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
		   
		           		   
		      <div id="sublabel31" style="text-align:center;">
			      Ambulance Information 
          </div>
          <div id="label3">





          <?php




$link = connect();
//Selecting DOC details to display to patient//
//Getting DB parameters- patId is gotten from SESSION variable
$patId = $_SESSION["id"];
$ambListStatus = "In session";
//$docId CHECK

//Selecting docId from WaitingList relation where patId= SESSION variable AND listStatus= On nurse queue
$selectAmbId = "SELECT ambId FROM ambwaitinglist WHERE patId = '$patId' AND ambListStatus = '$ambListStatus'";

$result1 = $link->query($selectAmbId);


while ($row = $result1->fetch_assoc()){
  $ambId = $row['ambId'];

  $link2 = connect();
  $selectAmbInfo = "SELECT * FROM ambulance WHERE ambId = '$ambId' ";
  $result2 = $link2->query($selectAmbInfo );
  
  while ($row2 = $result2->fetch_assoc()){


    echo      
    "<div id='sublabel32' align = 'center'>"."Driver Name:      ".$row2['ambDriverName']."<br>"."</div>";

   

    echo "    
    <div id='sublabel32' align = 'center' style='margin-top:20px;'>
        Driver Phone: "             .$row2['ambDriverPhone']                             ."<br>
        Driver Email: "             .$row2['ambEmail']                             ."<br>
        No Plate: "                 .$row2['ambNoPlate']                             ."<br>
     
    </div><br>
    ";


  
  }
}

?>



      

		    
           
 

          <div id="sublabel33">	
				     <a href="emergency1.php" style="color: #FDFEFE">Done</a>				 
          </div>

        
          </div>
          
          
		   </div>
		
          
        
</body>
</html>