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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Appointment Replies</h3>
            </div>
            <!-- /.card-header -->
          </br>
           
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

            $query="SELECT*FROM reply";
            $query_run=mysqli_query($connection,$query);
            ?>
            <div class="card-body">
              <table id="example2" class="table table-dark table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Patient No</th>
                  <th>Patient Name</th>
                  <th>Response</th>
                  <th>Status</th>
                  <th>Doctor</th>
                  
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
                        <td> <?php echo $row['response']; ?> </td>
                        <td> <b class="m-0 text-blue"><?php echo $row['status']; ?></b> </td>
                        <td> <?php echo $row['doctor']; ?> </td>
                       
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
            <!-- /.card-body -->
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
