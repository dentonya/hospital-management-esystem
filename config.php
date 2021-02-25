<?php


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hospital');


 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $link-> query("DELETE FROM users WHERE id=$id") or die ($link->error());

    $_SESSION['message']="Record has been deleted!!";
    $_SESSION['msg_type']="danger";
    header("location:patient-records.php");
}

/**if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $link->query("SELECT*FROM users WHERE id=$id") or die($link->error());

    if (count ($link)==1){
        $row=$link->fetch_array();
        $patientNo=$row['patientno'];
        $username_err =$row['username'];
        $patientAge=$row['patientage'];
        $Location=$row['location'];
        $contactNo=$row['contactno'];
        $password_err = $row['password'];
        $confirm_password_err=$row['confirm password'];
    }

 }**/

 if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="SELECT * FROM admin where email='$email' AND password ='$password';";
	$result=mysqli_query($link,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['email']=$email;
		header("Location:index.php");
	}
	else
		// header("Location:error2.php");
		echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'login.php';</script>");
}
if(isset($_GET['delete1']))
{
    $id=$_GET['delete1'];
    $link-> query("DELETE FROM doctors WHERE id=$id") or die ($link->error());

    $_SESSION['message']="Record has been deleted!!";
    $_SESSION['msg_type']="danger";
    header("location:patient-records.php");
}

if(isset($_GET['delete2']))
{
    $id=$_GET['delete2'];
    $link-> query("DELETE FROM appointment WHERE id=$id") or die ($link->error());

    $_SESSION['message']="Record has been deleted!!";
    $_SESSION['msg_type']="danger";
    header("location:appointments.php");
}
?>