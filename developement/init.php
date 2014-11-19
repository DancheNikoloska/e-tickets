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
	$status = run_sql_file($con, "../developement/ticketsdb.sql");
	echo "<b>$status</b>";
	seedEntities($con);
	mysqli_close($con);
	echo "<br/>deleted your database, have a nice day";
}

/*
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
			}
			//mysqli_query($con, $command);
			$total++;
		}
	}
	//return number of successful queries and total number of queries found
	return "Executed total $total queries, out of which $success were succesfull";
}
function seedEntities($con) {
	$command = "INSERT INTO roles VALUES('admin','Administers the webpage, eats popcorn')";
	mysqli_query($con, $command);
	$command = "INSERT INTO roles VALUES('student','Learns stuff')";
	mysqli_query($con, $command);
	$command = "INSERT INTO roles VALUES('professor','Teaches stuff')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions VALUES(1,'view_course_files')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions VALUES(2,'view_students_profile')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions VALUES(3,'add_lectures')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions VALUES(4,'edit_course')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions VALUES(5,'add_lecture_files')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions_assigned VALUES(1,'professor')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions_assigned VALUES(2,'professor')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions_assigned VALUES(3,'professor')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions_assigned VALUES(4,'professor')";
	mysqli_query($con, $command);
	$command = "INSERT INTO permissions_assigned VALUES(5,'professor')";
	mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(1,'prof1@finki.com','prof1','a3bc80bfae7ad46112fa75e6ba63e387','professor')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(2,'prof2@finki.com','prof2','a3bc80bfae7ad46112fa75e6ba63e387','professor')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(3,'prof3@finki.com','prof3','a3bc80bfae7ad46112fa75e6ba63e387','professor')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(4,'stud1@finki.com','stud1','a3bc80bfae7ad46112fa75e6ba63e387','student')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(5,'stud2@finki.com','stud2','a3bc80bfae7ad46112fa75e6ba63e387','student')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(6,'stud3@finki.com','stud3','a3bc80bfae7ad46112fa75e6ba63e387','student')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(7,'lana@finki.com','lanaa','511427fe4e8c6240dd19f102ee8bacfc','student')";
    mysqli_query($con, $command);
    $command = "INSERT INTO users VALUES(8,'admin@admir.net','admin','a3bc80bfae7ad46112fa75e6ba63e387','admin')";
    mysqli_query($con,$command);
	$command = "INSERT INTO courses VALUES('course1',1,1,6)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses VALUES('course2',1,2,6)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses VALUES('course3',2,1,6)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses VALUES('course4',2,2,6)";
	mysqli_query($con, $command);
	$command = "INSERT INTO teaches_course VALUES('course1',1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO teaches_course VALUES('course2',2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO teaches_course VALUES('course3',2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO teaches_course VALUES('course3',3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course1',6,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course1',5,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course2',6,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course3',4,3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course3',5,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course2',7,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course1',7,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO courses_taken VALUES('course2',4,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO files VALUES(3, 'pdf', 'file3', 'course2', CURRENT_TIMESTAMP)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lectures VALUES (1, 1, 'course1', 'Introduction', 'Introduction', 1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lectures VALUES (2, 0, 'course1', 'Data Flow', 'Data Flow', 2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lectures VALUES (3, 1, 'course2', 'Introduction C#', 'Introduction C#', 3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lecture_times VALUES (1, CURRENT_TIMESTAMP, 'Introduction' ,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lecture_times VALUES (2, CURRENT_TIMESTAMP, 'Data Flow' ,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO lecture_times VALUES (3, CURRENT_TIMESTAMP, 'Introduction C#' ,3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (6,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (5,1)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (7,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (5,2)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (6,3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (7,3)";
	mysqli_query($con, $command);
	$command = "INSERT INTO attended_lectures VALUES (4,3)";
	mysqli_query($con, $command);
 
}
 *
 */
?>