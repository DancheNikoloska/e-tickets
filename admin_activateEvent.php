<?php 
$eventid=$_GET['eventid'];
//echo $eventid;
include_once 'database.php';
mysqli_query($link,"UPDATE events SET activated = IF(activated=0,1,0) where eventId=$eventid");
header("Location: eventsAdmin.php"); 

?>
