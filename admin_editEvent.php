<?php 
$eventid=$_GET['eventid'];
echo $eventid;
include_once 'database.php';
session_start();
$res=mysqli_query($link,"Select * from events where eventId=$eventid");
$row=mysqli_fetch_assoc($res);
$event_name=$row['event_name'];
$des = $row['event_description'];
$largeImg=$row['event_largeImg'];
$smallImg=$row['event_smallImg'];
$res3=mysqli_query($link, "Select period_date, period_time from events e, event_details ed, periods p where ed.event_id=e.eventId AND ed.period_id=p.periodId AND e.eventId=$eventid");
$row3=mysqli_fetch_assoc($res3);
$date = $row3['period_date'];
$time = $row3['period_time'];
$catId = $row['category_id'];
$res2=mysqli_query($link, "Select category_name from categories where categoryId=$catId");
$row2=mysqli_fetch_assoc($res2);
$cat=$row2['category_name'];
$res4=mysqli_query($link, "Select * from events e, event_details ed, places p where ed.event_id=e.eventId AND ed.place_id=p.placeId AND e.eventId=$eventid");
$row4=mysqli_fetch_assoc($res4);
$place_id=$row4['placeId'];
$place=$row4['place_name'];
$n = "";
$flag = false;
$imgL=false;
$imgS=false;
if (isset($_POST['submit'])) {

	$msg = "";
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

	//if ($flag) {

		if ($event_name != null && $des != null && $date != null && $time != null) {
			 
			  $q="UPDATE events e,event_details ed,periods p set e.event_name='$_POST[event]', e.event_description='$_POST[des]', e.category_id='$_POST[cat]', ed.place_id='$_POST[place]', p.period_date='$_POST[date]', p.period_time='$_POST[time]' where p.periodId=ed.period_id and ed.event_id=e.eventId and e.eventId=$eventid";
				if (mysqli_query($link, $q))
				{
					header("Location: eventsAdmin.php");
				}
				else 
				{
					$msg="Неуспешна промена во база!";
				}


			
		} else {
			$msg = "Пополнете ги сите полиња";
			
		}
	}

//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>homeAdmin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Event Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;border:0px; width:1280px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="margin-left: 100px;">E-tickets Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a class="active" href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Настани</a>
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-male fa-fw"></i> Организатори </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
                        </li>
                                               
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="width: 900px; margin-left: 350px;">
        	<div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-left: 15px;">Измени настан</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
<?php
if (isset($_POST['submit'])) {
	echo "<h5 style=color:red>" . $msg . "</h5>";
}
?>
            <!--updating event form -->
            
        <form action="" method="post"  enctype="multipart/form-data" >
		<div class="form-group">
		<label for="event">Име на настанот</label>
		<input type="text" class="form-control" name="event" id="event" value="<?php echo $event_name; ?>">
		
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
		
					($row['category_name']==$cat? print " selected ": print "");
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
		print "<select name='place' id='place'>";
		$result = mysqli_query($link, $query);
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				print "<option value='" . $row['placeId'] . "' ";
				($row['placeId']==$place_id? print " selected ": print "");
				print ">" . $row['place_name'] . "</option>";
			}
		}
		print "</select><br/>";
		?>
		
		</div>
		
		<label for="file" > Голема слика: </label>
		<?php echo $largeImg; ?><input  type="file" value="Избери Слика:" name="file" id="file"  />
		
		<br/>
		
		<label for="file1" > Мала слика: </label>
		<?php echo $smallImg; ?> <input  type="file"  value="Избери Слика:" name="file1" id="file1"  />
		<br/>
		
		<input  class="btn btn-default" type="submit"  value="Прикачи" name="submit" id="submit"  />
		
		</form>
           
           
            <!-- /.row -->
         </div>   
            <!-- /.row -->
        </div>
        <!--end of row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

  <!-- jQuery -->
    
   
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    
</html>

