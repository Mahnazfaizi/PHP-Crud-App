<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

 // Remove cookie variables
 $days = 2;
 setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
 
// Redirect to login page
header("location: login.php");
exit;
?>
