<?php
include('includes/header.php'); 
include('includes/sidebar.php'); 
?>
 <link rel="stylesheet" type="text/css" href="../print.css" media="print">
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Patients Records</h3>
            </div>
            <!-- /.card-header -->
            <?php require_once '../config.php'; ?>

            <?php 
             if (isset($_SESSION['message'])): ?>
             <div class="alert alert-<?=$_SESSION['msg_type']?>">
             <?php 
                 echo $_SESSION['message'];
                 unset($_SESSION['message']);
             ?>
             </div>
             <?php endif ?>
            <?php
            $sn=1;
            $connection=mysqli_connect("localhost","root","");
            $db=mysqli_select_db($connection,"hospital");

            $query="SELECT*FROM users";
            $query_run=mysqli_query($connection,$query);
            ?>
            <div class="card-body">
              <table id="example2" class="table table-dark table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Patient No</th>
                  <th>Patient Name</th>
                  <th>Age</th>
                  <th>Location</th>
                  <th>Contact No.</th>
                </tr>
                </thead>
             <?php
               if($query_run)
               {
                 foreach($query_run as $row)
                 {
              ?>
                <tbody>
                    <tr>
                        <td> <?php echo $sn; ?> </td>
                        <td> <?php echo $row['patientno']; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $row['patientage']; ?> </td>
                        <td> <?php echo $row['location']; ?> </td>
                        <td> <?php echo $row['contactno']; ?> </td>
                    </tr>
                    <?php 
                      $sn++;
                    ?>
                </tbody>
              <?php }
               }
               else
               {
                 echo "No record found";
               }
              ?>
              </table>
             
            </div>
            </div>
            <!-- /.card-body -->
            <div class="text-center ">
                  <button  onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
             </div>
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
