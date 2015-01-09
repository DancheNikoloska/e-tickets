<?php
ini_set('max_execution_time', 3000000);
session_start();
if (!isset($_GET['database']) || $_GET['database'] != $_SESSION['database']) {
	$number = mt_rand(0, 100);
	$_SESSION['database'] = $number;
	echo "Hello you have chosen to reinit the E-tickets database if you are sure just click <a href='?database=$number'>this pretty link here</a>";
	echo "<br/><br/><h1>Important</h1><p>In order for this to work you must create 'e-tickets' in your mysql</p>";
} else {
	unset($_SESSION['database']);
	$con = mysqli_connect("localhost", "root", "", "e-tickets");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$status = run_sql_file($con, "e-tickets.sql");
	echo "<b>$status</b>";
	//seedEntities($con);
	mysqli_close($con);
	echo "<br/>deleted your database, have a nice day";
}


function run_sql_file($con, $location) {
	//load file
	$commands = file_get_contents($location);
	//convert to array
	$commands = explode(";", $commands);
	//run commands
	$total = 0;
	$success = 0;
	foreach ($commands as $command) {
		echo "Executing: " . $command . "<br/><br/>";
		if (trim($command)) {
			$success += (mysqli_query($con, $command) == false ? 0 : 1);
			if ($success == 0) {
				echo "<p style='color:#FF0000'>FAILED</p>";
			echo "";
			}
			//mysqli_query($con, $command);
			$total++;
		}
	}
	//return number of successful queries and total number of queries found
	return "Executed total $total queries, out of which $success were succesfull";
	
}

 
?>