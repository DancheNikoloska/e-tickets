<!DOCTYPE html>
<html lang="en">

	<head>
		<title>home Organizator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-tickets</title>

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
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i> </a>

						<!-- /.dropdown-messages -->
					</li>
					<!-- /.dropdown -->

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>

					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">

							<li>
								<a href="homeOrganizator.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
							</li>
							<li>
								<a class="active" href="listEventOrganizator.php"> <i class="fa fa-bell-o fa-fw"></i> Настани</a>

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
							<h1 class="page-header" style="margin-left: 15px;">Настани</h1>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->

					<table class="table table-striped table-hover">
						<tr class="active" align="center">
							<th class="text-center">Име на настан</th>
							<th class="text-center">Датум</th>
							<th class="text-center">Продадени билети</th>
							<th class="text-center">Измени</th>
							<th class="text-center">Активирај</th>
						</tr>
						<?php

						include_once 'database.php';

						session_start();
//proverka dali ima najaven korisnik
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

						$id=$_SESSION['user_id'];
						$query = "Select * from events  where org_id= '$id'";
						$res = mysqli_query($link, $query);
						while ($row = mysqli_fetch_assoc($res)) {
						//get period
						$query2 = "Select period_date from events e, event_details ed, periods p where ed.event_id=e.eventId AND ed.period_id=p.periodId AND e.eventId=$row[eventId]";
						$d = mysqli_query($link, $query2);
						$res_datum = mysqli_fetch_assoc($d);
						$datum = $res_datum['period_date'];
						//get tickets number
						$query3 = "Select count(*) as no_tickets from tickets t, events e, event_details ed where t.details_id=ed.event_detailsId AND ed.event_id=e.eventId and e.eventId=$row[eventId]";
						$n = mysqli_query($link, $query3);
						$num = mysqli_fetch_assoc($n);
						$total_tickets = $num['no_tickets'];

						if ($row['eventId'] % 2 == 0) {

						echo "<tr class='info'>" . "<td class=\"text-center\"> $row[event_name] </td>" . "<td class=\"text-center\">$datum</td>" . "<td class=\"text-center\">10/$total_tickets</td>" . "<td class=\"text-center\"><a href=\"admin_editEvent.php?eventid=$row[eventId]\">Измени</a></td>" . "<td class=\"text-center\"><a href=\"admin_activateEvent.php?eventid=$row[eventId]\">" . ($row['activated'] == 1 ? 'Деактивирај' : 'Активирај') . "</a></td></tr>";

						} else {
						echo "<tr>" . "<td class=\"text-center\"> $row[event_name]</td>" . "<td class=\"text-center\">$datum</td>" . "<td class=\"text-center\">10/$total_tickets</td>" . "<td class=\"text-center\"><a href=\"admin_editEvent.php?eventid=$row[eventId]\">Измени</a></td>" . "<td class=\"text-center\"><a href=\"admin_activateEvent.php?eventid=$row[eventId]\">" . ($row['activated'] == 1 ? 'Деактивирај' : 'Активирај') . "</a></td></tr>";

						}

						}
						?>
					</table>

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

