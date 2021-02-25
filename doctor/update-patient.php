<?php
  require_once "../config.php";
  global $link;

  $patientno=$_POST["patientno"];
  $username=$_POST["username"];
  $patientage=$_POST["patientage"];
  $location=$_POST["location"];
  $contactno=$_POST["contactno"];

  $update= "UPDATE users set patientno='$patientno', username='$username',patientage='$patientage',loaction='$location',contactno='$contactno', where patientno=$patientno";
  $s=mysqli_query($link,$update);
  if($s)
  echo "Record Update Successfully!!";
  else
   echo "Error:Please Check values";
?>