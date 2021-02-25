<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$patientno=$username =$symptoms=$disease= $prescription = "";
$patientNo=$username_err =$Symptoms=$Disease=$Pres= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate patientno
    if(empty(trim($_POST["patientno"]))){
      $patientNo = "Please enter patients name.";
    }else{
      $patientno=trim($_POST['patientno']);
    }
    //Validate patient name(username)
    if(empty(trim($_POST["username"]))){
      $username_err = "Please enter patients name.";
    }else{
      $username=trim($_POST['username']);
    }

     //Validate patient age
     if(empty(trim($_POST["symptoms"]))){
      $Symptoms = "Please enter patients symptoms.";
    }else{
      $symptoms=trim($_POST['symptoms']);
    }
    
    //Validate patient location
     if(empty(trim($_POST["disease"]))){
      $Disease = "Please enter patients disease.";
    }else{
      $disease=trim($_POST['disease']);
    }
    if(empty(trim($_POST["prescription"]))){
      $Pres= "Please enter patients prescription.";
    }else{
      $prescription=trim($_POST['prescription']);
    }
        
      
    // Check input errors before inserting in database
    if(empty($patientNo) && empty($username_err) && empty($Symptoms) && empty($Disease) && empty($Pres)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO prescription (patientno, username,symptoms,disease,prescription,) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_patientno,$param_username,$param_sysmptoms,$param_disease,$param_prescription);
            
            // Set parameters
            $param_patientno = $patientno;
            $param_username  = $username;
            $param_sysmptoms = $symptoms;
            $param_disease = $disease;
            $param_prescription = $prescription;
            
            
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
                <h3 class="card-title">PATIENT PRESCRIPTIONS</h3>
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
            <div class="form-group <?php echo (!empty($Symptoms)) ? 'has-error' : ''; ?>">
                <label>Symptoms</label>
                <textarea name="symptoms"class="form-control" placeholder="Enter patient symptoms..." value="<?php echo $symptoms; ?>" ></textarea>
                <span class="help-block"><?php echo $Symptoms; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($Disease)) ? 'has-error' : ''; ?>">
                <label>Disease</label>
                <textarea name="disease"class="form-control" placeholder="Enter the patients disease..." value="<?php echo $disease; ?>" ></textarea>
                <span class="help-block"><?php echo $Disease; ?></span>
            </div> 
            
            <div class="form-group <?php echo (!empty($Pres)) ? 'has-error' : ''; ?>">
                <label>Prescription</label>
                <textarea name="prescription"class="form-control" placeholder="Enter prescription here..." value="<?php echo $prescription; ?>" ></textarea>
                <span class="help-block"><?php echo $Pres; ?></span>
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
