<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$docname=$specialization =$docemail=$contactno=$password=$confirm_password = "";
$docName=$Specialization =$docEmail=$contactNo=$password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

       //Validate doctor name
       if(empty(trim($_POST["docname"]))){
        $docName = "Please enter doctors name.";
      }else{
        $docname=trim($_POST['docname']);
      }

       //Validate doctor specialization
     if(empty(trim($_POST["specialization"]))){
      $Specialization = "Please enter doctors specialization.";
    }else{
      $specialization=trim($_POST['specialization']);
    }
 
    // Validate doctor email
    if(empty(trim($_POST["docemail"]))){
        $docEmail= "Please enter doctors email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM doctors WHERE docemail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_docemail);
            
            // Set parameters
            $param_docemail = trim($_POST["docemail"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $docEmail = "This doctor email  already exist.";
                } else{
                    $docemail = trim($_POST["docemail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate contactno
    if(empty(trim($_POST["contactno"]))){
      $contactNo = "Please enter doctors phone number";     
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
    if(empty($docName) && empty($Specialization) && empty($docEmail) && empty($contactNo) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO doctors (docname, specialization,docemail,contactno, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_docname,$param_specialization,$param_docemail,$param_contactno,$param_password);
            
            // Set parameters
            $param_docname = $docname;
            $param_specialization  = $specialization;
            $param_docemail = $docemail;
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
  <div style="background: url(img/doc.png)">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin || Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD DOCTOR</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group">
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="form-group <?php echo (!empty($docName)) ? 'has-error' : ''; ?>">
                <label>Doctor Name*</label>
                <input type="text" name="docname" class="form-control" value="<?php echo $docname; ?>">
                <span class="help-block"><?php echo $docName; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($Specialization)) ? 'has-error' : ''; ?>">
                <label>Doctor Specialization*</label>
                <input type="text" name="specialization" class="form-control" value="<?php echo $specialization; ?>">
                <span class="help-block"><?php echo $Specialization; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($docEmail)) ? 'has-error' : ''; ?>">
                <label>Email*</label>
                <input type="text" name="docemail" class="form-control" value="<?php echo $docemail; ?>">
                <span class="help-block"><?php echo $docEmail; ?></span>
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
       
        <!-- /.row -->
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
