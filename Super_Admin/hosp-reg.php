<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$hospName = $hospAdmin = $username = $lat = $long = $hospOpeningHrs = $hospClosingHrs	 = $address = $password = $confirm_password = "";
$hospName_err = $lat_err = $long_err =$hospAdmin_err = $username_err = $hospOpeningHrs_err = $hospClosingHrs_err = $address_err = $password_err = $confirm_password_err = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	  
	      if(empty(trim($_POST["hospName"]))){
        $hospName_err = "Please enter a first name.";
        }
		else{
			        // Prepare a select statement
        $sql = "SELECT hospId FROM hospital WHERE hospName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_hospName);
            
            // Set parameters
            $param_hospName = trim($_POST["hospName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $hospName= trim($_POST["hospName"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
			
		}
		
		if(empty(trim($_POST["hospAdmin"]))){
        $hospAdmin_err = "Please enter a last name.";
        }
		else{
			
			        // Prepare a select statement
        $sql = "SELECT hospId FROM hospital WHERE hospAdmin = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_hospAdmin);
            
            // Set parameters
            $param_hospAdmin = trim($_POST["hospAdmin"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                 
                    $hospAdmin = trim($_POST["hospAdmin"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
        }
        

        if(empty(trim($_POST["lat"]))){
            $lat_err = "Please enter a the latitude.";
            }
            else{
                        // Prepare a select statement
            $sql = "SELECT hospId FROM hospital WHERE hospLat = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_hospLat);
                
                // Set parameters
                $param_hospLat = trim($_POST["lat"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    
                        $lat= trim($_POST["lat"]);
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
                
                
            }


            if(empty(trim($_POST["long"]))){
                $long_err = "Please enter a longitude.";
                }
                else{
                            // Prepare a select statement
                $sql = "SELECT hospId FROM hospital WHERE hospLong = ?";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_hospLong);
                    
                    // Set parameters
                    $param_hospLong = trim($_POST["long"]);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        /* store result */
                        mysqli_stmt_store_result($stmt);
                        
                        
                            $long= trim($_POST["long"]);
                        
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                 
                // Close statement
                mysqli_stmt_close($stmt);
                    
                    
                }
	
	    if(empty(trim($_POST["hospOpeningHrs"]))){
        $hospOpeningHrs_err = "Please enter a date of birth.";
        }
		else{
						        // Prepare a select statement
        $sql = "SELECT hospId FROM hospital WHERE hospOpeningHrs = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_hospOpeningHrs);
            
            // Set parameters
            $param_hospOpeningHrs = trim($_POST["hospOpeningHrs"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $hospOpeningHrs= trim($_POST["hospOpeningHrs"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
        }

        if(empty(trim($_POST["hospClosingHrs	"]))){
            $hospClosingHrs_err = "Please enter a Phone Number.";
            }
            else{
                                    // Prepare a select statement
            $sql = "SELECT hospId FROM hospital WHERE hospClosingHrs = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_hospClosingHrs	);
                
                // Set parameters
                $param_hospClosingHrs	 = trim($_POST["hospClosingHrs	"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    
                        $hospClosingHrs	= trim($_POST["hospClosingHrs	"]);
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
                
            }
        

        if(empty(trim($_POST["address"]))){
            $address_err = "Please enter an address.";
            }
            else{
                
                        // Prepare a select statement
            $sql = "SELECT hospId FROM hospital WHERE hospAddress = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_address);
                
                // Set parameters
                $param_address = trim($_POST["address"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                     
                        $address = trim($_POST["address"]);
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
                
            }


	
	
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT hospId FROM hospital WHERE adminEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email already exist.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if( empty($hospName_err) && empty($hospAdmin_err) && empty($username_err) &&   empty($hospOpeningHrs_err)  &&  empty($hospClosingHrs_err)  && empty($address_err) && empty($password_err) && empty($confirm_password_err)){

        /* function getLatLong($code){
            $mapsApiKey = 'AIzaSyCX_XcVwDhTZdtx8-mkuitLN48uuBT_FE4&v=3';
            $query = "https://maps.google.co.ke/maps/geo?q=".urlencode($code)."&output=json&key=".$mapsApiKey;
            $data = file_get_contents($query);
            // if data returned
            if($data){
             // convert into readable format
             $data = json_decode($data);
             $long = $data->Placemark[0]->Point->coordinates[0];
             $lat = $data->Placemark[0]->Point->coordinates[1];
 
             return array('Latitude'=>$lat,'Longitude'=>$long);
             //return $lat;
            }else{
             return false;
            }
           }
        */
        
        // Prepare an insert statement
        $sql = "INSERT INTO hospital (hospName, hospAdmin, hospOpeningHrs, hospClosingHrs	, adminEmail, hospAddress, adminPassword, hospLat, hospLong) VALUES (?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_hospName, $param_hospAdmin, $param_hospOpeningHrs, $param_hospClosingHrs	 ,$param_username,  $param_address, $param_password, $param_lat, $param_long);
            
            // Set parameters
			$param_hospName = $hospName;
			$param_hospAdmin = $hospAdmin;
            $param_username = $username;
            $param_hospOpeningHrs= $hospOpeningHrs;
            $param_hospClosingHrs	= $hospClosingHrs	;
            $param_address = $address;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


          
            $param_lat =   $lat;     //getLatLong($_POST["address"]);
            $param_long =  $long;            //getLatLong($_POST["address"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
                //print_r(getLatLong($_POST["address"]));
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<title>Doctor Registration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="nurseStyle.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    
        
		
		.wrapper{ width: 350px; padding: 20px; 
		margin: auto;
		
		border-radius: 25px;
		
		background-color: white;
        border:1px solid;
	
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
 

#constant{
      background-color: white;
      height: 100%;
      padding: 0%;
	  }
	      .navbar {
    
     
      font-family: "Angsana New", Angsana, serif;
      font-size:20px;

    }

    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	
    </style>
    </head>
 
<body class="w3-light-grey">

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
      <span>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></span><br>
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
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="w3-row-padding w3-margin-bottom">
  


 

			
<div id ="back">
<div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		     <div class="form-group <?php echo (!empty($hospName_err)) ? 'has-error' : ''; ?>">
			    <label>Hospital Name</label>
	            <input type="text" name="hospName" class="form-control" value="<?php echo $hospName; ?>">
				<span class="help-block"><?php echo $hospName_err; ?></span>
			 </div>
			 <div class="form-group <?php echo (!empty($hospAdmin_err)) ? 'has-error' : ''; ?>">
			   <label>Admin Name</label>
	           <input type="text" name="hospAdmin" class="form-control" value="<?php echo $hospAdmin; ?>">
			   <span class="help-block"><?php echo $hospAdmin_err; ?></span>
			 </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($hospOpeningHrs_err)) ? 'has-error' : ''; ?>">
                <label>Opening Hours</label>
                <input type="time" name="hospOpeningHrs" class="form-control" value="<?php echo $hospOpeningHrs; ?>">
			    <span class="help-block"><?php echo $hospOpeningHrs_err; ?></span>
			</div>

            <div class="form-group <?php echo (!empty($hospClosingHrs_err)) ? 'has-error' : ''; ?>">
                <label>Closing Hours</label>
            
                <input type="time" name="hospClosingHrs	" class="form-control" value="<?php echo $hospClosingHrs	; ?>">
			    <span class="help-block"><?php echo $hospClosingHrs_err; ?></span>
			</div>
            
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Geo Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($lat_err)) ? 'has-error' : ''; ?>">
                <label>Latitude</label>
                <input type="text" name="lat" class="form-control" value="<?php echo $lat; ?>">
                <span class="help-block"><?php echo $lat_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($long_err)) ? 'has-error' : ''; ?>">
                <label>Longitude</label>
                <input type="text" name="long" class="form-control" value="<?php echo $long; ?>">
                <span class="help-block"><?php echo $long_err; ?></span>
            </div>
        			
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
    </div>    



</div>

<footer class="w3-container w3-padding-16 w3-light-grey">
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
  </footer>

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
