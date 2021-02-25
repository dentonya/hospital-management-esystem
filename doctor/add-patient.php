<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$patientno=$username =$patientage=$location=$contactno= $password = $confirm_password = "";
$patientNo=$username_err =$patientAge=$Location=$contactNo=$password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate patientno
    if(empty(trim($_POST["patientno"]))){
        $patientNo = "Please enter patients number.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE patientno = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_patientno);
            
            // Set parameters
            $param_patientno = trim($_POST["patientno"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $patientNo = "This patient number is already taken.";
                } else{
                    $patientno = trim($_POST["patientno"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Validate patient name(username)
    if(empty(trim($_POST["username"]))){
      $username_err = "Please enter patients name.";
    }else{
      $username=trim($_POST['username']);
    }

     //Validate patient age
     if(empty(trim($_POST["patientage"]))){
      $patientAge = "Please enter patients age.";
    }else{
      $patientage=trim($_POST['patientage']);
    }
    
    //Validate patient location
     if(empty(trim($_POST["location"]))){
      $Location = "Please enter patients location.";
    }else{
      $location=trim($_POST['location']);
    }
    // Validate contactno
    if(empty(trim($_POST["contactno"]))){
      $contactNo = "Please enter patients phone number";     
   } elseif(strlen(trim($_POST["contactno"])) >10){
      $contactNo = "Phone number must have atleast 10 characters.";
   } else{
      $contactno = trim($_POST["contactno"]);
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
    if(empty($patientNo) && empty($username_err) && empty($patientAge) && empty($Location) && empty($contactNo) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (patientno, username, patientage, location, contactno, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_patientno,$param_username,$patientage,$location,$param_contactno,$param_password);
            
            // Set parameters
            $param_patientno = $patientno;
            $param_username  = $username;
            $param_patientage = $patientage;
            $param_location = $location;
            $param_contactno = $contactno;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Doctor || Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD PATIENT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                <div class="form-group">
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="form-group <?php echo (!empty($patientNo)) ? 'has-error' : ''; ?>">
                <label>Patient No.</label>
                <input type="text" name="patientno" class="form-control" value="<?php echo $patientno; ?>">
                <span class="help-block"><?php echo $patientNo; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Patient Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($patientAge)) ? 'has-error' : ''; ?>">
                <label>Patient Age</label>
                <input type="text" name="patientage" class="form-control" value="<?php echo $patientage; ?>">
                <span class="help-block"><?php echo $patientAge; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($Location)) ? 'has-error' : ''; ?>">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
                <span class="help-block"><?php echo $Location; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($contactNo)) ? 'has-error' : ''; ?>">
                <label>Contact No.</label>
                <input type="text" name="contactno" class="form-control" value="<?php echo $contactno; ?>">
                <span class="help-block"><?php echo $contactNo; ?></span>
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
          </div>
          </div>
        </form>
    </div>    
              
    
        
            
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
     
        
      
  
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
</html>
