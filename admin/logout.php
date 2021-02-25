<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
//$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location:../login.php");
//exit;
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    session_destroy();
    header("location: login.php");
    exit;
}*/
?>