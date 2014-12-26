<?php
$row=$_REQUEST["row"];
$seat=$_REQUEST["seat"];
$user=$_REQUEST["user_id"];
$event=$_REQUEST["event_id"];
$status=$_REQUEST["status"];

if($status==1){
 $conn=mysqli_connect('localhost','root','','e-tickets');
 $sql="INSERT INTO TICKETS VALUES(null,".$row.",".$seat.",'".bin2hex(mcrypt_create_iv(7, MCRYPT_DEV_URANDOM))."',".$event.",150)";
 if(mysqli_query($conn,$sql))
  {
  	$sql2="SELECT MAX(ticket_id) as last from TICKETS";
	if($result=mysqli_query($conn,$sql2))
    {
  	  $row = mysqli_fetch_assoc($result);
	  $id= $row['last'];
	  //update buyback
	  $sql3="INSERT INTO buyback VALUES(null,".$user.",".$id.",".$event.",NOW())";
	  if(mysqli_query($conn,$sql3)){
	  	echo "OK";
	  }
    }
  }
 else echo mysqli_error($conn);
 
}else if($status==0){
	$conn=mysqli_connect('localhost','root','','e-tickets');
	//delete ticket
	$sql2="DELETE From buyback where user_id=".$user." and event_id=".$event." and ticket_id in (select ticket_id from tickets where row=".$row." and seat=".$seat." and event_id=".$event.")"; 
	  if(mysqli_query($conn,$sql2)){
	  	echo "OK";
	  }
    $sql="DELETE From Tickets where row=".$row." and seat=".$seat." and event_id=".$event;
      if(mysqli_query($conn,$sql)){
      	echo "OK";
      }else echo mysqli_error($conn);
	
}
?>