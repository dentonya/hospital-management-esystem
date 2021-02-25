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
        <div class="row">
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Huduma Bora</h3>

                <p><h4>Patients</h4></p>
              </div>
              <div class="icon">
               <i class="fas fa-hospital-user"></i>
              
                              </div>
              <a href="patient-print.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Huduma Bora<h3>
                <p><h4>Doctors</h4></p>
              </div>
              <div class="icon">
                <i class="fas fa-user-md"></i>
              </div>
              <a href="print.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Huduma Bora</h3>
              <p><h4>Appointments</h4></p>
              </div>
              <div class="icon">
                <i class="fas fa-mail-bulk"></i>
              </div>
              <a href="appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3>Huduma Bora</h3>
                <p><h4>Patients Book</h4></p>
              </div>
              <div class="icon">
              <i class="fas fa-book-medical"></i>
              </div>
              <a href="patient-records.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
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
