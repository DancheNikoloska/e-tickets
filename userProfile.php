<!DOCTYPE html>
<?php
 include_once 'database.php';
 include_once 'delete_reservations.php';
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-tickets Shop</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/shop-homepage.css" rel="stylesheet">
	</head>

	<body>

		<!-- Navigation -->
		<?php 
		session_start();
		include_once 'navBar.php'; 	
		?>
			
		<!-- Page Content style="margin-top:100px;" -->
		<div class="container">
			<div class="row">
				<div class="panel">
				<h2 class="text-center"><?php echo $_SESSION['username']?>  овде можете да ги видите вашите омилени претстави</h2>
				</div>
				<div class="col-xs-6">
					<h3 class="text-center">Претстави кои ги имате гледано</h3>	
					<div class="table-responsive">
					  <table class="table table-striped">
					       <thead>
						    <tr>
						        <th>Датум</th>
						        <th>Време</th>
						        <th>Претстава</th>
						        <th>Код</th>
						    </tr>
						    <tbody>
							<?php 
								$u=$_SESSION['username'];
								$user=mysqli_query($link, "SELECT distinct * FROM users WHERE username LIKE '$u'");
								$userID=mysqli_fetch_assoc($user);
								$uID=$userID['user_id'];
								//gi naogame site rezervirani bileti od korisnikot
								$tickets=mysqli_query($link, "SELECT distinct * FROM boughttickets WHERE user_id LIKE '$uID'");
								//gi naogame site kupeni bileti od korisnikot
								while ($ticket=mysqli_fetch_assoc($tickets)) {
									$eventID=$ticket['event_id'];
									$ticketID=$ticket['ticket_id']; 
									
									$eventInfoPrev=mysqli_query($link, "SELECT distinct * FROM events WHERE event_id LIKE '$eventID' 
															AND period_date < (NOW()) ORDER BY period_date,period_time ASC");
									while ($ev=mysqli_fetch_assoc($eventInfoPrev)) {
										$name=$ev['event_name'];
										$date=$ev['period_date'];
										$time=$ev['period_time'];									
							?>
						    <tr>
						        <td><?php echo $date; ?></td>
						        <td><?php echo $time; ?></td>
						        <td><?php echo $name; ?></td>
						        <?php 
						        	$code=mysqli_query($link, "SELECT distinct * from tickets WHERE ticket_id='$ticketID'");
									while($c=mysqli_fetch_assoc($code)){	
						        ?>
						        <td><?php echo $c['code']; ?></td>
						    </tr>
						    	<?php } } }?>
						    </tbody>
						    </thead>
					  </table>
					</div>			
				</div>	
				<div class="col-xs-6">
					<h3 class="text-center">Претстави што следуваат</h3>
					<table class="table table-striped">
					       <thead>
						    <tr>
						        <th>Датум</th>
						        <th>Време</th>
						        <th>Претстава</th>
						        <th>Код</th>
						    </tr>
						    <tbody>
							<?php 
							$tickets=mysqli_query($link, "SELECT distinct * FROM boughttickets WHERE user_id LIKE '$uID'");
								while ($ticket=mysqli_fetch_assoc($tickets)) {
									$eventID=$ticket['event_id'];
									$ticketID=$ticket['ticket_id']; 										
									$eventInfoNext=mysqli_query($link, "SELECT distinct * FROM events WHERE event_id LIKE '$eventID' 
															AND period_date > (NOW()) ORDER BY period_date,period_time ASC");
									while ($ev1=mysqli_fetch_assoc($eventInfoNext)) {
										$name1=$ev1['event_name'];
										$date1=$ev1['period_date'];
										$time1=$ev1['period_time'];									
							?>
						    <tr>
						        <td><?php echo $date1; ?></td>
						        <td><?php echo $time1; ?></td>
						        <td><?php echo $name1; ?></td>
						        <?php 
						        	$code=mysqli_query($link, "SELECT distinct * from tickets WHERE ticket_id='$ticketID'");
									while($c=mysqli_fetch_assoc($code)){	
						        ?>
						        <td><?php echo $c['code']; ?></td>
						    </tr>
						    	<?php }  }}?>
						    </tbody>
						    </thead>
					  </table>
					<?php?>						
				</div>
			</div>							
								
		</div>
		<!-- /.container -->

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



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
