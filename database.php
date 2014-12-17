<?php
/*
$link=mysql_connect('localhost','root','');
mysql_select_db('sars_database');
//if ($link) echo "Connected";
*/
?>  

<?php
$link=mysqli_connect("localhost" , "root" ,  "" , "e-tickets");
$link->set_charset("utf8");
if(!$link) die("Error:" .mysql_connect_error() );
?>