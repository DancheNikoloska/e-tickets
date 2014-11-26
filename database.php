<?php
/*
$link=mysql_connect('localhost','root','');
mysql_select_db('sars_database');
//if ($link) echo "Connected";
*/
?>  

<?php
$link=mysqli_connect("localhost" , "root" ,  "" , "ticketsdb");
if(!$link) die("Error:" .mysql_connect_error() );
?>