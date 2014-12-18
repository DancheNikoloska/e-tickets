<?php
include_once 'database.php';

session_start();
if (isset($_SESSION['username'])) {

	$user = $_SESSION['username'];
	
	$flag = 1;
	echo $_SESSION['username'];
	echo $_SESSION['user_id'];
} else {

	$user = "Најавете се!";
	$flag = 0;
	header("Location: login.php");
}



	
	
$eventName = "";
$des = "";
$date = "";
$time = "";
$cat = "";
$n = "";
$flag = false;
$msg="";
/*if(isset($_GET['ci']))
 {
 $title="Направи ги потребните измени за курсот ".$_GET['ci'];
 $query = "SELECT * FROM courses WHERE course_name LIKE ".$_GET['ci'];
 $result = mysqli_query($link, $query);
 while ($course=mysql_fetch_assoc($result))
 {
 $courseName = $course['course_name'];
 $level = $course['course_name'];
 $semester = $course['course_name'];
 $credits = $_POST['credits'];
 }
 }*/

if (isset($_POST['submit'])) {

	$eventName = $_POST['event'];
	$des = $_POST['des'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$msg = "";
	$msg1 = "";

	$cat = $_POST['cat'];
	$place_id = $_POST['scene'];

	$ext = explode(".", $_FILES["file"]["name"]);
	$extension = $ext[count($ext) - 1];
	//print_r($_FILES);

	$imageFileType = $_FILES["file"]["type"];

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			$flag = false;
		} else {
			if (!file_exists("images")) {
				mkdir("images");
			}

			move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
			move_uploaded_file($_FILES["file1"]["tmp_name"], "images/" . $_FILES["file1"]["name"]);
			//header('Location: upload.php');
			//echo " <p > Успешно прикачување! <p>";
			$msg1="Успешно прикачување на сликите!";
			$now = date("Y-m-d H:i");
			$n = $_FILES["file"]["name"];
			$n1 = $_FILES["file1"]["name"];
			$t = $_FILES["file"]["type"];
			$flag = true;

		}
	} else {

		//echo " <p > Невалиден формат! Внесете .jpg, .png или .gif формат. <p>";
		$flag = false;
		//header('Location: upload.php');
	}

	if ($flag) {

		if ($eventName != null && $des != null && $date != null && $time != null && $cat != null) {
			$query = "SELECT * FROM events WHERE event_name LIKE '$eventName'";
			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) > 0) {
				$msg = "Веќе постои настан со истото име!";
			} else {
				
				$query1="INSERT INTO events(event_name, event_description, period_date, period_time, genre_id, small_img, big_img, scene)
				 VALUES('$eventName','$des','$date','$time','$cat','$n','$n1', '$place_id') ";
				 $row=mysqli_query($link, $query1);
				 if($row)
				 {
				 	$msg="Успешно додадовте претстава!";
					
				 }
				 else {
					 $msg="Неуспешно додадавање, Обидете се повторно.";
				 }


		}
	}

 else {
			$msg = "Пополнете ги сите полиња site";
			//$msg+=$cat;
		}
		}
	else {
		$msg="Неуспешно прикачување.";
	}
	
	function rand_string($len, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
		$string = '';
		for ($i = 0; $i < $len; $i++) {
			$pos = rand(0, strlen($chars) - 1);
			$string .= $chars{$pos};
		}
		return $string;
	}
	
		$query = "SELECT event_id FROM events WHERE event_name LIKE '$eventName'";
			$result = mysqli_query($link, $query);			
			$row1 = mysqli_fetch_assoc($result);
			$event= $row1['event_id'];
			
$num = 600;
//$type = "";
//$price = "";
//$auto = "";
for($i=1;$i<=30;$i++)
	{
		$ticket_row= $i  ;
		for($j=1; $j<=20;$j++)
		{
			$ticket_seat=$j;
			$code = rand_string(10);
			//echo "ROW: ". $ticket_row . "SEAT: ". $ticket_seat;
			$query1="INSERT INTO tickets(row, seat, code, event_id)
				 VALUES('$ticket_row','$ticket_seat','$code','$event') ";
				 $row=mysqli_query($link, $query1);
				 if(!$row)
				 {
				 	$msg="Неуспешно додадени билети!";
					
				 }
				 
			
		}
		
	}
	
	
	

}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>Е-tickets- електронски сајт за билети</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<?php
include_once 'navBar.php';
?>

<div class="container">

<div class="row">

<div class="col-md-8">

<?php
if (isset($_POST['submit'])) {
	echo "<h5 style=color:red>" . $msg . $msg1. "</h5>";
}
?>
<h3 style="color:gray">Внесување на нова претстава</h3>
<br />

<form action="" method="post"  enctype="multipart/form-data" >
<div class="form-group">
<label for="event">Име на претставата </label>
<input type="text" class="form-control" name="event" id="event" value="<?php echo $eventName; ?>">

<label for="des">Опис:</label>
<input type="text" class="form-control" name="des" id="des" value="<?php echo $des; ?>">

<label for="date"> Датум: (gggg-mm-dd) </label>
<br/>
<input type="text" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
<label for="time"> Времe: (hh:mm:ss)</label>
<br/>
<input type="text" class="form-control" name="time" id="time" value="<?php echo $time; ?>">
<label> Категорија:</label>
<br/>
<?php $query = "SELECT * FROM genres ";
	//select na vekepostoecki kategorii
	print "<select name='cat' id='cat'>";
	$result = mysqli_query($link, $query);
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			print "<option value='" . $row['id'] . "' ";

			print ">" . $row['name'] . "</option>";
		}
	}
	print "</select><br/>";
?>

<label> Сцена:</label>
<br/>
<input type="radio" name="scene" value="big" checked="true">Голема сцнеа
<input type="radio" name="scene" value="small":> Мала сцена
<br/>

<label for="file" > Голема слика: </label>
<input  type="file"  value="Избери Слика:" name="file" id="file"  />
<br/>

<label for="file1" > Мала слика: </label>
<input  type="file"  value="Избери Слика:" name="file1" id="file1"  />
<br/>
</div>
<input  class="btn btn-default" type="submit"  value="Прикачи" name="submit" id="submit"  />

</form>
</div>

</div>
</div>

<!-- Team Member Profiles -->

<div class="container">
<footer>
<div class="row">
<div class="col-lg-12">
<div class="row well">

<p align="center">
2013  ФИНКИ |    Факултет за информатички науки и компјутерско инженерство
</p>
</div>

</div>
</div>
</footer>

</div><!-- /.container -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/modern-business.js"></script>

</body>
</html>
