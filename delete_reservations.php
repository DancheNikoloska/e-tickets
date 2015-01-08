<?php
 include_once 'database.php';
 //get and delete from tickets
 $query ="SELECT ticket_id from byuback where time_reserved < (NOW() - INTERVAL 3 MINUTE)";
 $result= mysqli_query($link,$query);
 
 //create second connection to db
  $link2=mysqli_connect("localhost" , "root" ,  "" , "e-tickets");
  $link2->set_charset("utf8");
 while($data = mysqli_fetch_assoc($result)){
   $tmp_sql= ("DELETE FROM tickets where ticket_id=".$data['ticket_id']);
   mysqli_query($link2,$tmp_sql);
 }
 //delete from buyback
 $sql= "DELETE FROM buyback WHERE time_reserved < (NOW() - INTERVAL 3 MINUTE)";
 mysqli_query($link, $sql);
?>