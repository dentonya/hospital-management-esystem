<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$patientno=$username =$location=$contactno= $doctor =$time=$date="";
$patientNo=$username_err =$Location=$contactNo=$Doctor =$Time=$Day=  "";
 
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
   //Validate patient age
     if(empty(trim($_POST["doctor"]))){
      $Doctor = "Please enter doctor.";
    }else{
      $doctor=trim($_POST['doctor']);
    }
      //Validate patient age
      if(empty(trim($_POST["time"]))){
        $Time = "Please enter time.";
      }else{
        $time=trim($_POST['time']);
      }
        //Validate patient age
     if(empty(trim($_POST["date"]))){
      $Day = "Please enter date and day.";
    }else{
      $date=trim($_POST['date']);
    }
        
    
    // Check input errors before inserting in database
    if(empty($patientNo) && empty($username_err) && empty($Location) && empty($contactNo) && empty($Doctor)&& empty($Time)&& empty($Day)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO appointment (patientno, username, location, contactno,doctor,time,date) VALUES (?, ?, ?, ?, ?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_patientno,$param_username,$location,$param_contactno,$param_doctor,$param_time,$param_date);
            
            // Set parameters
            $param_patientno = $patientno;
            $param_username  = $username;
            $param_location = $location;
            $param_contactno = $contactno;
            $param_doctor = $doctor;
            $param_time = $time;
            $param_date = $date;
            
            
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
                <h3 class="card-title">Book Appointment</h3>
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
            <div class="form-group <?php echo (!empty($Doctor)) ? 'has-error' : ''; ?>">
                <label>Doctor Name.</label>
                <input type="text" name="doctor" class="form-control" value="<?php echo $doctor; ?>">
                <span class="help-block"><?php echo $Doctor; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($Time)) ? 'has-error' : ''; ?>">
                <label>Time.</label>
                <input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
                <span class="help-block"><?php echo $Time; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($Day)) ? 'has-error' : ''; ?>">
                <label>Day.</label>
                <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
                <span class="help-block"><?php echo $Day; ?></span>
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
