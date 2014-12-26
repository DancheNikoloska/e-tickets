<?php
 include_once 'database.php';
 $sql= "DELETE FROM buyback WHERE time_reserved < (NOW() - INTERVAL 1 MINUTE)";
 mysqli_query($link, $sql);
?>