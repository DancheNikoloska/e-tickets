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
	$status = run_sql_file($con, "ticketsdb.sql");
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


 
function seedEntities($link) {
	
	//insert into categories
	$query = "INSERT INTO `categories`  VALUES
(null, N'Спорт', N'Спортски натпревари'),
(null, N'Музика', N'Музички концерти'),
(null, N'Кино', N'Билети за кино'),
(null, N'Театар', N'Билети за театарски претстави')";
	mysqli_query($link, $query);
	
	//insert into events
	$query= "INSERT INTO `events` VALUES
	(null, N'Концерт на Каролина Гочева', N'Промоција на новиот албум - Македонско девојче',2 , 'small_image', 'large_image'),
	(null, N'Сомнително лице', N'Комедија', 4, 'small_image', 'large_image'),
	(null, N'Концерт на Тони Цетински', N'Тони Цетински конечно во Македонија',2, 'small_image', 'large_image'),
	(null, N'Арсенал - Реал Мадрид', N'Големо дерби',1, 'small_image', 'large_image' 'small_image', 'large_image'),
	(null, 'Red riding hood', 'Set in a medieval village that is haunted by a werewolf, a young girl falls for an orphaned woodcutter, much to her familys displeasure.',3 ,'small_image', 'large_image')";
	mysqli_query($link, $query);
	
	//insert into users
	$query="INSERT INTO `users` VALUES
	(null, 'user1', 'user1pass', 'user1@gmail.com', N'Корисник'),
	(null, 'user2', 'user2pass', 'user2@gmail.com', N'Корисник'),
	(null, 'user3', 'user3pass', 'user3@gmail.com', N'Корисник'),
	(null, 'user4', 'user4pass', 'user4@gmail.com', N'Корисник'),
	(null, 'admin1', 'admin1pass', 'admin1@gmail.com', N'Администратор'),
	(null, 'org1', 'org1pass', 'org1@gmail.com', N'Организатор'),
	(null, 'org2', 'org2pass', 'org2@gmail.com', N'Организатор')";
	mysqli_query($link, $query);
	
	//insert into places
	$query="INSERT INTO `places` VALUES
	(null, N'Метрополис Арена', N'Илинденска бр.14','metropolis.jpg',10000),
	(null, N'Борис Трајковски', N'Љубљанска 15', 'boris.jpg', 7000),
	(null, N'Кино Милениум', N'Даме Груев бр. 30', 'milenuim.jpg', 600),
	(null, N'Македонски Народен Театар', N'Кеј бб', 'mnt.jpg', 800)";
	mysqli_query($link, $query);
	
	//insert into periods
	$query="INSERT INTO periods VALUES
	(null, '2014-12-03','17:00:00'),
	(null, '2014-12-18', '20:00:00'),
	(null, '2014-12-18', '16:00:00'),
	(null, '2015-01-16', '21:00:00')";
	mysqli_query($link, $query);
	
	
	//insert into events details
	$query="INSERT INTO event_details VALUES
	(null,2,1,1),
	(null,1,2,4),
	(null,3,3,5),
	(null,4,4,2),
	(null,3,2,3)";
	mysqli_query($link, $query);
	
	
	//insert into tickets
	$query="INSERT INTO tickets VALUES
	(null, N'abd33', N'ВИП', 300, 1),
	(null, N'cde33', N'Трибина', 200, 4),
	(null, N'ааае3', N'Сала 1', 150, 5),
	(null, N'2p4o', N'Галерија 1', 100, 2),
	(null, N'qei1', N'Партер', 500, 3),
	(null, N'ar23', N'ВИП', 300, 1),
	(null, N'c12333', N'Трибина', 200, 4),
	(null, N'аhgs3', N'Сала 1', 150, 5),
	(null, N'0123o', N'Галерија 1', 100, 2),
	(null, N'0ej1g', N'Партер', 500, 3)";
	mysqli_query($link, $query);
	
	//has ticket
	$query="INSERT INTO has_ticket VALUES
	(1,1),
	(1,4),
	(1,6),
	(2,3),
	(2,2),
	(2,10),
	(3,7),
	(3,8)
	";
	mysqli_query($link, $query);
}
 
?>