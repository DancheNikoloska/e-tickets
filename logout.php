<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: homeUser.php"); // Redirecting To Home Page
}
?>