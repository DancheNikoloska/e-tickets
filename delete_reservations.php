<?php
 include_once 'database.php';
 $sql= "DELETE FROM buyback WHERE time_reserved < (NOW() - INTERVAL 3 MINUTE)";
 mysqli_query($link, $sql);
?>