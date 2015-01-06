<?php
include_once 'database.php';
// go naogame id-to na logiraniot korisnik
$u=$_SESSION['username'];
$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
$userID=mysqli_fetch_assoc($user);
$uID=$userID['user_id'];
//gi naogame site rezervirani bileti od korisnikot
$tickets=mysqli_query($link, "SELECT * FROM buyback WHERE user_id LIKE '$uID'");
$ticketID;$eventID;
while ($ticket=mysqli_fetch_assoc($tickets)) {
	$buybackID=$ticket['buyback_id'];
	$ticketID=$ticket['ticket_id'];
	$eventID=$ticket['event_id'];
	
	//gi vnesuvame bo baza kupenite bileti za korisnikot
	$query1="INSERT INTO boughttickets (event_id, ticket_id, user_id) VALUES ('$eventID','$ticketID','$uID')";
	$insertIntoBought=mysqli_query($link, $query1);
}
//gi briseme soodvetnite rezervirani bileti od bazata
$query2="DELETE FROM buyback WHERE user_id LIKE '$uID'";
$deleteFromReserved=mysqli_query($link, $query2);
?>