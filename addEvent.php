<?php
include_once 'database.php';
session_start();
$eventName = "";
$des = "";
$date = "";
$time = "";
$cat = 1;
$n = "";
$flag = false;
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

	$cat = $_POST['cat'];
	$place_id = $_POST['place'];

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
			echo " <p > Успешно прикачување! <p>";
			$now = date("Y-m-d H:i");
			$n = $_FILES["file"]["name"];
			$n1 = $_FILES["file1"]["name"];
			$t = $_FILES["file"]["type"];
			$flag = true;

		}
	} else {

		echo " <p > Невалиден формат! Внесете .jpg, .png или .gif формат. <p>";
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

				$query1 = "INSERT INTO periods (period_date, period_time)
	 				VALUES('" . $date . "','" . $time . "')";
				if (mysqli_query($link, $query1)) {
					$query = "INSERT INTO events(event_name, event_description, category_id, event_largeImg, event_smallImg)
	 				VALUES('" . $eventName . "','" . $des . "','" . $cat . "' ,'" . $n . "','" . $n1 . "')";

					if (mysqli_query($link, $query)) {
						
						//header("Location: dashboard.php");

						
						$re= mysqli_query($link, "SELECT eventId FROM events WHERE event_name LIKE '$eventName'");
						if($re)
						{
							$row = mysqli_fetch_assoc($re);
							$event_id = $row['eventId'];
						}
						$tt=$time+":00";
						$re1 = mysqli_query($link, "SELECT periodId FROM periods WHERE period_date LIKE '0000-00-00' AND period_time LIKE '00:00:00' ");
						
						if($re1)
						{
							$row1 = mysqli_fetch_assoc($re1);
							$period_id = $row1['periodId'];
						}
						

						if ($event_id != null && $period_id != null ) {
							if($place_id!=null)
							{
								$query2 = "INSERT INTO event_details (period_id ,  event_id, place_id)	
							VALUES('" . $period_id . "','" . $event_id . "','" . $place_id . "')";
							if (mysqli_query($link, $query2)) {
								$msg = "Успешно додаден настан! ";
							} else {
								$msg="Неуспешно поврзување на табелите";
							}
							
								
							}
							else
								{
									$msg="Неуспешно читање од lista";
								}
							
						}
						else {
							$msg="Неуспешно читање од база";
						}
						
						
						

					} else {
								$msg = "Настанот не беше додаден, обидете се повторно! ";
						//$msg += $cat;
					}

				} else {
					$msg = "Периодот не беше додаден, обидете се повторно! ";
					//$msg += $cat;
				}

			}
		} else {
			$msg = "Пополнете ги сите полиња";
			//$msg+=$cat;
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
	echo "<h5 style=color:red>" . $msg . "</h5>";
}
?>
<h3 style="color:gray">Внесување на нов настан</h3>
<br />

<form action="" method="post"  enctype="multipart/form-data" >
<div class="form-group">
<label for="event">Име на настанот </label>
<input type="text" class="form-control" name="event" id="event" value="<?php echo $eventName; ?>">

<label for="des">Опис:</label>
<input type="text" class="form-control" name="des" id="des" value="<?php echo $des; ?>">

<label for="date"> Датум: (gggg/mm/dd) </label>
<br/>
<input type="text" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
<label for="time"> Времe: (hh:mm)</label>
<br/>
<input type="text" class="form-control" name="time" id="time" value="<?php echo $time; ?>">
<label> Категорија:</label>
<br/>
<?php $query = "SELECT * FROM categories ";
	//select na vekepostoecki kategorii
	print "<select name='cat' id='cat'>";
	$result = mysqli_query($link, $query);
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			print "<option value='" . $row['categoryId'] . "' ";

			print ">" . $row['category_name'] . "</option>";
		}
	}
	print "</select><br/>";
?>

<label> Место:</label>
<br/>

<?php
$query = "SELECT * FROM places ";
//select na vekepostoecki mesta
print "<select name='place'>";
$result = mysqli_query($link, $query);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		print "<option value='" . $row['placeId'] . "' ";

		print ">" . $row['place_name'] . "</option>";
	}
}
print "</select><br/>";
?>

</div>

<label for="file" > Голема слика: </label>
<input  type="file"  value="Избери Слика:" name="file" id="file"  />
<br/>

<label for="file1" > Мала слика: </label>
<input  type="file"  value="Избери Слика:" name="file1" id="file1"  />
<br/>

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
