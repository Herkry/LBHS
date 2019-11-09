<?php
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$ambNoPlate = $ambType	 = $username = $ambDriverName = $ambDriverPhone = $ambCapacity = $password = $confirm_password = "";
$ambNoPlate_err = $ambType_err = $username_err = $ambDriverName_err = $ambDriverPhone_err = $ambCapacity_err = $password_err = $confirm_password_err = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	  
	      if(empty(trim($_POST["ambNoPlate"]))){
        $ambNoPlate_err = "Please enter a Number Plate.";
        }
		else{
			        // Prepare a select statement
        $sql = "SELECT ambId FROM ambulance WHERE ambNoPlate = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ambNoPlate);
            
            // Set parameters
            $param_ambNoPlate = trim($_POST["ambNoPlate"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $ambNoPlate= trim($_POST["ambNoPlate"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
			
		}
		
		if(empty(trim($_POST["ambType"]))){
        $ambType_err = "Please enter an ambulance type.";
        }
		else{
			
			        // Prepare a select statement
        $sql = "SELECT ambId FROM ambulance WHERE ambType	 = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ambType	);
            
            // Set parameters
            $param_ambType	 = trim($_POST["ambType"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                 
                    $ambType	 = trim($_POST["ambType"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
		}
	
	    if(empty(trim($_POST["ambDriverName"]))){
        $ambDriverName_err = "Please enter driver name.";
        }
		else{
						        // Prepare a select statement
        $sql = "SELECT ambId FROM ambulance WHERE ambDriverName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ambDriverName);
            
            // Set parameters
            $param_ambDriverName = trim($_POST["ambDriverName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $ambDriverName= trim($_POST["ambDriverName"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
        }

        if(empty(trim($_POST["ambDriverPhone"]))){
            $ambDriverPhone_err = "Please enter a Phone Number.";
            }
            else{
                                    // Prepare a select statement
            $sql = "SELECT ambId FROM ambulance WHERE ambDriverPhone = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_ambDriverPhone);
                
                // Set parameters
                $param_ambDriverPhone = trim($_POST["ambDriverPhone"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    
                        $ambDriverPhone= trim($_POST["ambDriverPhone"]);
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
                
            }
        

        if(empty(trim($_POST["ambCapacity"]))){
            $ambCapacity_err = "Please enter an ambulance capacity.";
            }
            else{
                
                        // Prepare a select statement
            $sql = "SELECT ambId FROM ambulance WHERE ambCapacity = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_ambCapacity);
                
                // Set parameters
                $param_ambCapacity = trim($_POST["ambCapacity"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                     
                        $ambCapacity = trim($_POST["ambCapacity"]);
                    
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
        $sql = "SELECT ambId FROM ambulance WHERE ambEmail = ?";
        
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
    if( empty($ambNoPlate_err) && empty($ambType_err) && empty($username_err) &&   empty($ambDriverName_err)  &&  empty($ambDriverPhone_err)  && empty($ambCapacity_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO ambulance (ambNoPlate, ambType	, ambDriverName, ambDriverPhone, ambEmail, ambCapacity, ambPassword) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_ambNoPlate, $param_ambType	, $param_ambDriverName, $param_ambDriverPhone ,$param_username,  $param_ambCapacity, $param_password);
            
            // Set parameters
			$param_ambNoPlate = $ambNoPlate;
			$param_ambType	 = $ambType	;
            $param_username = $username;
            $param_ambDriverName= $ambDriverName;
            $param_ambDriverPhone= $ambDriverPhone;
            $param_ambCapacity = $ambCapacity;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
  <title>Registration</title>
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
    .navbar {
    
      background-image:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(myArt.jpg);
      font-family: "Angsana New", Angsana, serif;
      font-size:20px;

    }

		#back{
		
		    height: 800px;
			margin-top: 20px;
            padding-top: 20px;
            background-image: url(csback.jpg);
		}



	
    </style>
</head>
<body>
<div id="constant">
  <div id="label1" style="color: #CB4335; font-family: Angsana New, Angsana, serif; font-size:25px;">
      <img src="logo.png" height="70" width="70"/>
      Geolocation Based Healthcare
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
        <li ><a href="test.html#myCarousel" style="color: white;">Home</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="login.php" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

		
    <div id ="back">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		     <div class="form-group <?php echo (!empty($ambNoPlate_err)) ? 'has-error' : ''; ?>">
			    <label>Number Plate</label>
	            <input type="text" name="ambNoPlate" class="form-control" value="<?php echo $ambNoPlate; ?>">
				<span class="help-block"><?php echo $ambNoPlate_err; ?></span>
			 </div>
			 <div class="form-group <?php echo (!empty($ambType_err)) ? 'has-error' : ''; ?>">
			   <label>Ambulance Type</label>
	           <input type="text" name="ambType" class="form-control" value="<?php echo $ambType	; ?>">
			   <span class="help-block"><?php echo $ambType_err; ?></span>
			 </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($ambDriverName_err)) ? 'has-error' : ''; ?>">
                <label>Driver Name</label>
                <input type="text" name="ambDriverName" class="form-control" value="<?php echo $ambDriverName; ?>">
			    <span class="help-block"><?php echo $ambDriverName_err; ?></span>
			</div>

            <div class="form-group <?php echo (!empty($ambDriverPhone_err)) ? 'has-error' : ''; ?>">
                <label>Telephone Number</label>
            
                <input type="tel" name="ambDriverPhone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control" value="<?php echo $ambDriverPhone; ?>">
			    <span class="help-block"><?php echo $ambDriverPhone_err; ?></span>
			</div>
            
            <div class="form-group <?php echo (!empty($ambCapacity_err)) ? 'has-error' : ''; ?>">
                <label>Ambulance Capacity</label>
                <input type="text" name="ambCapacity" class="form-control" value="<?php echo $ambCapacity; ?>">
                <span class="help-block"><?php echo $ambCapacity_err; ?></span>
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
</body>
</html>