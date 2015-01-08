<?php 
session_start();
 include_once 'delete_reservations.php';
include_once 'database.php';
if (isset($_SESSION['adminname'])) {

	$user = $_SESSION['adminname'];
	$flag = 1;
	//echo $_SESSION['username'];
	//echo $_SESSION['user_id'];
} else {

	$user = "Најавете се!";
	$flag = 0;
	header("Location: adminLogin.php");
}
//varijabli
$eventName = "";
$des = "";
$price="";
$date = "";
$time = "";
$cat = "";
$n = "";
$flag = false;
$msg = "";


if (isset($_POST['submit'])) {
//zemanje na vrednosti
	$eventName = $_POST['event'];
	$des = $_POST['des'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$price = $_POST['price'];
	$msg = "";
	$msg1 = "";

	$cat = $_POST['cat'];
	
	$ext = explode(".", $_FILES["file"]["name"]);
	$extension = $ext[count($ext) - 1];
	//print_r($_FILES);

	$imageFileType = $_FILES["file"]["type"];
//proverka na promenlivi dali imaat vrednost
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif") {
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			$flag = false;
		} else {
			//kreiraj folder
			if (!file_exists("images")) {
				mkdir("images");
			}

			move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
			move_uploaded_file($_FILES["file1"]["tmp_name"], "images/" . $_FILES["file1"]["name"]);
			
			$msg1 = "Успешно прикачување на сликите!";
			$now = date("Y-m-d H:i");
			$n = $_FILES["file"]["name"];
			$n1 = $_FILES["file1"]["name"];
			$t = $_FILES["file"]["type"];
			$flag = true;

		}
	} else {
		//echo " <p > Невалиден формат! Внесете .jpg, .png или .gif формат. <p>";
		$flag = false;
	}

	if ($flag) {
//vnesuvanje vo baza
		if ($eventName != null && $des != null && $date != null && $time != null && $cat != null) {
			$query = "SELECT * FROM events WHERE event_name LIKE '$eventName'";
			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) > 0) {
				$msg = "Веќе постои настан со истото име!";
			} else {

				$query1 = "INSERT INTO events(event_name, event_description, period_date, period_time, genre_id, small_img, big_img,active)
				 VALUES('$eventName','$des','$date','$time','$cat','$n','$n1',1) ";
				$row = mysqli_query($link, $query1);
				if ($row) {
					$msg = "Успешно додадовте претстава!";

				} else {
					$msg = "Неуспешно додадавање, Обидете се повторно.";
				}

			}
		} else {
			$msg = "Пополнете ги сите полиња site";
			//$msg+=$cat;
		}
	} else {
		$msg = "Неуспешно прикачување.";
	}
//funkcija za kodovite za karttite- random
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
	$event = $row1['event_id'];

	$num = 600;	
	
}
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                    <?php	if ($flag==1){ ?>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                        
                            <a href="logout.php">
                                Logout
                            </a>
                        <?php   } ?>
                          
                        </li>
                    </ul>
                    
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
                            <a href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Настани</a>
                            
                        </li>
                
                        <li>
                            <a class="active" href="usersAdmin.php"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a href="statistics.php"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
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
                    <h1 class="page-header" style="margin-left: 15px;">Претстави</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
          

<?php
//html kod
if (isset($_POST['submit'])) {
	echo "<h5 style=color:red>" . $msg . $msg1 . "</h5>";
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
<label for="time"> Цена на билет:</label>
<br/>
<input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">
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


<label for="file" > Мала слика: </label>
<input  type="file"  value="Избери Слика:" name="file" id="file"  />
<br/>

<label for="file1" > Голема слика: </label>
<input  type="file"  value="Избери Слика:" name="file1" id="file1"  />
<br/>
</div>
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
  
  <div class="container">

				<hr>

				<footer>
					<div class="row">
						<div class="col-lg-12">
							<div class="row well">

								<p align="center">
									2014  ФИНКИ |    Факултет за информатички науки и компјутерско инженерство
								</p>
							</div>

						</div>
					</div>
				</footer>

			</div><!-- /.container -->

    
   
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
  
    
</html>

