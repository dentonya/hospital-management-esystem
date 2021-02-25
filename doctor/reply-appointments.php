<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$patientno=$username =$response=$status= $doctor="";
$patientNo=$username_err =$Response=$Status=$Doctor =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate patientno
    if(empty(trim($_POST["patientno"]))){
      $patientNo = "Please enter your patient no.";
    }else{
      $patientno=trim($_POST['patientno']);
    }
    
    //Validate patient name(username)
    if(empty(trim($_POST["username"]))){
      $username_err = "Please enter patients name.";
    }else{
      $username=trim($_POST['username']);
    }
    
    //Validate patient location
     if(empty(trim($_POST["response"]))){
      $Response = "Please enter response.";
    }else{
      $response=trim($_POST['response']);
    }
   
   //Validate patient age
     if(empty(trim($_POST["status"]))){
      $Status = "Please enter status.";
    }else{
      $status=trim($_POST['status']);
    }

      //Validate patient age
     if(empty(trim($_POST["doctor"]))){
        $Doctor = "Please enter doctor name.";
      }else{
        $doctor=trim($_POST['doctor']);
      }
     
        
    
    // Check input errors before inserting in database
    if(empty($patientNo) && empty($username_err) && empty($Response) && empty($Status) && empty($Doctor)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO reply (patientno, username,response,status,doctor) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_patientno,$param_username,$param_response,$param_status,$param_doctor);
            
            // Set parameters
            $param_patientno = $patientno;
            $param_username  = $username;
            $param_response = $response;
            $param_status = $status;
            $param_doctor = $doctor;
           
            
            
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
            <h1 class="m-0 text-dark">Patients|| Dashboard</h1>
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
                <h3 class="card-title">Reply Appointment</h3>
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
             
            <div class="form-group <?php echo (!empty($Response)) ? 'has-error' : ''; ?>">
                <label>Response</label>
                <input type="text" name="response" class="form-control" value="<?php echo $response; ?>">
                <span class="help-block"><?php echo $Response; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($Status)) ? 'has-error' : ''; ?>">
                <label>Status.</label>
                <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                <span class="help-block"><?php echo $Status; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($Doctor)) ? 'has-error' : ''; ?>">
                <label>Doctor Name.</label>
                <input type="text" name="doctor" class="form-control" value="<?php echo $doctor; ?>">
                <span class="help-block"><?php echo $Doctor; ?></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
               
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