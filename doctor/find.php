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
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">UPDATE PATIENTS DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php require_once '../config.php'; ?>
                       
             <?php 
             $patientno="";
             $username ="";
             $patientage="";
             $location="";
             $contactno="";
              $sql = "SELECT *  from users where patientno = patientno";
              $rs = mysqli_query($link, $sql);
              //get row 
              while ( $fetchRow = mysqli_fetch_array($rs)) {
                
                $patientno=$fetchRow['patientno'];
                $username= $fetchRow['username'];
                $patientage= $fetchRow['patientage'];
                $location=$fetchRow['location'];
                $contactno=$fetchRow['contactno'];
              }
              mysqli_free_result($rs);
              mysqli_close($link);

              //$fetchRow = mysqli_fetch_assoc($rs);
            ?>


        <div class="card-body">
         <div class="form-group">
           <form  action ="update-patient.php"method="post">
           <div class="form-group ">
          
                <label>Patient No.</label>
                <input type="text" readonly name="patientno" class="form-control"  value="<?php echo $patientno?>">
                <span class="help-block"></span>
            </div>  
            <div class="form-group ">
                <label>Patient Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username?>">
                <span class="help-block"></span>
            </div> 
            <div class="form-group ">
                <label>Patient Age</label>
                <input type="text" name="patientage" class="form-control" value="<?php echo $patientage?>">
                <span class="help-block"></span>
            </div>  
            <div class="form-group ">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location?>">
                <span class="help-block"></span>
            </div>  
            <div class="form-group ">
                <label>Contact No.</label>
                <input type="text" name="contactno" class="form-control" value="<?php echo $contactno?>">
                <span class="help-block"></span>
            </div>     
           
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
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