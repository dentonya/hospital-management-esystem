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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Patients|| Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row ">
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Huduma Bora</h3>

                <p><h4>Access Your Data</h4></p>
              </div>
              <div class="icon">
               <i class="fas fa-hospital-user"></i>
              
                              </div>
              <a href="data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="../doctor/profile.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <p><h4>Book Appointments</h4></p>
              </div>
              <div class="icon">
                <i class="fas fa-mail-bulk"></i>
              </div>
              <a href="book-appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-5 col-10">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3>HUduma Bora</h3>
                <p><h4>Appointment Response</h4></p>
              </div>
              <div class="icon">
              <i class="fas fa-mail-bulk"></i>
              </div>
              <a href="replied-appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
            
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
