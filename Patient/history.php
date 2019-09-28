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
<html lang="en">
<head>
  <title>Medical History</title>
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
            height: 500px;
        
			
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
     border-radius: 25px;
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

     table, th, td{
     opacity: 0.85;
     margin: 20px;
     width: 60%;
     padding: 20px;
     border: 2px solid #F4D03F;
     border-collapse: collapse;
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
	  <div id="sublabel13">
		  <img src= "profile.png" height="20" width="20" />
		  <?php echo htmlspecialchars($_SESSION["username"]); ?>
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
        <li ><a href="dash1.php" style="color: white;">Appointments</a></li>
        <li><a href="emergency1.php"style="color: white;">Emergency</a></li>
        <li ><a href="prescription.php"style="color: white;">Prescription</a></li>
        <li class="active"><a href="#"style="color: white;">Medical History</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="reset-password.php" style="color: white;">Reset Your Password</a></li>
        <li ><a href="logout.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


		   
		   
		   <div id="back">
          <div style = "margin: 20px">	
            <table>
               <tr>
               <h4>This is Your Medical History<h4>
               <th>Patient ID</th>
               <th>Record ID</th>
               <th>Temperature</th>
               <th>Blood Pressure</th>
               <th>BMI</th>
               <th>Glucose Level</th>

               <th>Symptoms</th>
               <th>Illness</th>
               <th>Doctor Note</th>
               <th>Pharmacy ID</th>
               <th>Prescription ID</th>

               <th>Update Date</th>
               </tr>
               <?php
               require_once "dbConnection.php";
               $link = connect();
               $uid = $_SESSION["id"];

              $query1 = "SELECT * FROM `medicalRecords` WHERE patId = '$uid' ";
              $result = $link->query($query1);

              while ($row = $result->fetch_assoc()){


          
              $u2 = $row['medRecId'];
              $u3 = $row['temp'];
              $u4 = $row['bloodP'];
              $u5 = $row['bmi'];
              $u6 = $row['glcLvl'];
              $u7 = $row['symptoms'];
              $u8 = $row['illness'];
              $u9 = $row['docNote'];
              $u12 = $row['date_created'];
              $u10 = $row['pharmId'];
              $u11 = $row['prescId'];
              $u1 = $row['patId'];



              echo "<tr><td>".$u1."</td><td>".$u2."</td><td>".$u3."</td><td>".$u4."</td><td>".$u5."</td><td>".$u6."</td><td>".$u7."</td><td>".$u8."</td><td>".$u9."</td><td>".$u10."</td><td>".$u11."</td><td>".$u12."</td></tr>";


              }


  

              ?>
            </table>
          </div>
		   




		   </div>
		   <footer class="container-fluid text-center">
            <p>Footer Text</p>
        </footer>
</body>
</html>