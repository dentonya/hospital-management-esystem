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
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Doctors Records</h3>
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

            $query="SELECT*FROM doctors";
            $query_run=mysqli_query($connection,$query);
            ?>
            <div class="card-body">
              <table id="example2" class="table table-dark table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Doctor Name</th>
                  <th>Specialization</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th colspan="3">Action</th>
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
                        <td> <?php echo $row['docname']; ?> </td>
                        <td> <?php echo $row['specialization']; ?> </td>
                        <td> <?php echo $row['docemail']; ?> </td>
                        <td> <?php echo $row['contactno']; ?> </td>
                        <td>  <a href="add-doctor.php?edit=<?php echo $row['id']; ?>"
                              class="btn btn-info">Edit</a>
                              <a href="add-doctor.php?delete1=<?php echo $row['id']; ?>"
                              class="btn btn-danger">Delete</a>
                              <a href="add-doctor.php?update=<?php echo $row['id']; ?>"
                              class="btn btn-warning">Update</a>
                        </td>
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
