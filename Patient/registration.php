<?php
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$fName = $lName = $username = $patDOB = $patPhone = $address = $password = $confirm_password = "";
$fName_err = $lName_err = $username_err = $patDOB_err = $patPhone_err = $address_err = $password_err = $confirm_password_err = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	  
	      if(empty(trim($_POST["fName"]))){
        $fName_err = "Please enter a first name.";
        }
		else{
			        // Prepare a select statement
        $sql = "SELECT patId FROM patient WHERE patFname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_fName);
            
            // Set parameters
            $param_fName = trim($_POST["fName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $fName= trim($_POST["fName"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
			
		}
		
		if(empty(trim($_POST["lName"]))){
        $lName_err = "Please enter a last name.";
        }
		else{
			
			        // Prepare a select statement
        $sql = "SELECT patId FROM patient WHERE patLname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_lName);
            
            // Set parameters
            $param_lName = trim($_POST["lName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                 
                    $lName = trim($_POST["lName"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
		}
	
	    if(empty(trim($_POST["bday"]))){
        $patDOB_err = "Please enter a date of birth.";
        }
		else{
						        // Prepare a select statement
        $sql = "SELECT patId FROM patient WHERE patDOB = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_patDOB);
            
            // Set parameters
            $param_patDOB = trim($_POST["bday"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $patDOB= trim($_POST["bday"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
			
        }

        if(empty(trim($_POST["patPhone"]))){
            $patPhone_err = "Please enter a Phone Number.";
            }
            else{
                                    // Prepare a select statement
            $sql = "SELECT patId FROM patient WHERE patPhone = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_patPhone);
                
                // Set parameters
                $param_patPhone = trim($_POST["patPhone"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    
                        $patPhone= trim($_POST["patPhone"]);
                    
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
            $sql = "SELECT patId FROM patient WHERE patAddress = ?";
            
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
        $sql = "SELECT patId FROM patient WHERE patEmail = ?";
        
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
    if( empty($fName_err) && empty($lName_err) && empty($username_err) &&   empty($patDOB_err)  &&  empty($patPhone_err)  && empty($address_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO patient (patFname, patLname, patDOB, patPhone, patEmail, patAddress, patPassword) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_fName, $param_lName, $param_patDOB, $param_patPhone ,$param_username,  $param_address, $param_password);
            
            // Set parameters
			$param_fName = $fName;
			$param_lName = $lName;
            $param_username = $username;
            $param_patDOB= $patDOB;
            $param_patPhone= $patPhone;
            $param_address = $address;
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
        <li><a href="#" style="color: white;">About Us</a></li>
        <li><a href="#"style="color: white;">Services</a></li>
        <li><a href="#"style="color: white;">Contacts</a></li>
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
		     <div class="form-group <?php echo (!empty($fName_err)) ? 'has-error' : ''; ?>">
			    <label>First Name</label>
	            <input type="text" name="fName" class="form-control" value="<?php echo $fName; ?>">
				<span class="help-block"><?php echo $fName_err; ?></span>
			 </div>
			 <div class="form-group <?php echo (!empty($lName_err)) ? 'has-error' : ''; ?>">
			   <label>Last Name</label>
	           <input type="text" name="lName" class="form-control" value="<?php echo $lName; ?>">
			   <span class="help-block"><?php echo $lName_err; ?></span>
			 </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($patDOB_err)) ? 'has-error' : ''; ?>">
                <label>Date Of Birth</label>
                <input type="date" name="bday" class="form-control" value="<?php echo $patDOB; ?>">
			    <span class="help-block"><?php echo $patDOB_err; ?></span>
			</div>

            <div class="form-group <?php echo (!empty($patPhone_err)) ? 'has-error' : ''; ?>">
                <label>Telephone Number</label>
            
                <input type="tel" name="patPhone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control" value="<?php echo $patPhone; ?>">
			    <span class="help-block"><?php echo $patPhone_err; ?></span>
			</div>
            
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
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