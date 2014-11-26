<?php
session_start();
if (!isset($_GET['krastavica']) || $_GET['krastavica'] != $_SESSION['krastavica']) {
	$number = mt_rand(0, 100);
	$_SESSION['krastavica'] = $number;
	echo "Hello you have chosen to reinit the E-tickets database if you are sure just click <a href='?krastavica=$number'>this pretty link here</a>";
	echo "<br/><br/><h1>Important</h1><p>In order for this to work you must create 'ticketsdb' in your mysql</p>";
} else {
	unset($_SESSION['krastavica']);
	$con = mysqli_connect("localhost", "root", "", "ticketsdb");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$status = run_sql_file($con, "ticketsdb1.sql");
	echo "<b>$status</b>";
	seedEntities($con);
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
				echo "<p style='color:#FF0000'>FAILED MOFO</p>";
			echo "";
			}
			//mysqli_query($con, $command);
			$total++;
		}
	}
	//return number of successful queries and total number of queries found
	return "Executed total $total queries, out of which $success were succesfull";
}


 
function seedEntities($con) {
	$command = "INSERT INTO `categories`  VALUES
(1, 'Спорт', 'Спортски натпревари'),
(2, 'Музика', 'Музички концерти'),
(3, 'Кино', 'Билети за кино'),
(4, 'Театар', 'Билети за театарски претстави')";
	mysqli_query($con, $command);
	$command = "INSERT INTO `events` (`id`, `name`, `placeId`, `categoryId`, `periodsId`, `description`) VALUES
(1, 'Сомнително лице', 5, 4, 1, 'Театарска претстава там тарам'),
(2, 'Концерт Каролина Гочева', 4, 2, 2, 'Промоција на албумот Македонско девојче II')";
	mysqli_query($con, $command);
	
	$command = "INSERT INTO `periods` (`id`, `date`, `time`, `placeId`) VALUES
(1, '2014-11-25', '17:00:00', 2),
(2, '2014-11-29', '20:00:00', 2)";
	mysqli_query($con, $command);
	$command = "

INSERT INTO `places` (`id`, `address`, `name`, `image`, `capacity`) VALUES
(2, 'Љубљанска бр.4', 'Cineplexx', 'images/cineplexx.jpg', 400),
(3, 'Градски стадион б.б.', 'Национална арена Филип II', 'images/filipII.jpg', 10000),
(4, '8 Септември бр.13', 'Спортска сала Борис Трајковски', 'images/boris_trajkovski.jpg', 5000),
(5, 'Kej бр.23', 'Македонски народен театар', 'images/mnt', 800)";
	mysqli_query($con, $command);
	$command = "INSERT INTO `ticket_types` (`id`, `name`, `state`, `price`) VALUES
(1, 'Партер', 'Слободен', 300),
(2, 'ВИП', 'Слободен', 500),
(3, 'Трибина', 'Резервиран', 400)";
	mysqli_query($con, $command);
	
}
 
?>