<?php
 include_once 'delete_reservations.php';
session_start();
$type=$_SESSION["type"];
if(session_destroy()) // Destroying All Sessions
{
if ($type=="admin"){
	header("Location: adminLogin.php"); // Redirecting To Home Page
}
else {
	header("Location: homeUser.php"); // Redirecting To Home Page	
}

}
?>