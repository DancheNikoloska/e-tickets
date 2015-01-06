<!DOCTYPE html>
<?php include_once 'database.php';
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
				<div class="col-xs-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="panel-title">
									<div class="row">
										<div class="col-xs-6">
											<h5><span class="glyphicon glyphicon-shopping-cart"></span> Купувачка кошничка</h5>
										</div>
										<div class="col-xs-6">
											<!--redirect do welcome-->
											<a href="homeUser.php" class="btn btn-primary btn-sm btn-block">
												 <span class="glyphicon glyphicon-share-alt"></span>Продолжи со купување</a>
										</div>
									</div>
								</div>
							</div>
							
				<div class="panel-body">
						<?php
										// go naogame id-to na logiraniot korisnik
										$u=$_SESSION['username'];
										$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
										$userID=mysqli_fetch_assoc($user);
										$uID=$userID['user_id'];
										//gi naogame site rezervirani bileti od korisnikot
										$tickets=mysqli_query($link, "SELECT * FROM buyback WHERE user_id LIKE '$uID'");
										//gi definirame site promenlivi sto ke gi koristime za prikazuvanje na informacii
										$row; $seat; $code; $price; $name; $date; $time; $img; $buybackID; $totalPrice=0;
										while ($ticket=mysqli_fetch_assoc($tickets)) {
											$buybackID=$ticket['buyback_id'];
											$ticketID=$ticket['ticket_id'];
											//informacii za biletot
											$ticketInfo=mysqli_query($link, "SELECT * FROM tickets WHERE ticket_id LIKE '$ticketID'");
											while ($tick=mysqli_fetch_assoc($ticketInfo)) {
												$row=$tick['row'];
												$seat=$tick['seat'];
												$code=$tick['code'];
												$price=$tick['price'];
												$totalPrice+=$price;
											}
											//informacii za nastanot
											$eventID=$ticket['event_id'];
											$eventInfo=mysqli_query($link, "SELECT * FROM events WHERE event_id LIKE '$eventID'");
											while ($ev=mysqli_fetch_assoc($eventInfo)) {
												$name=$ev['event_name'];
												$date=$ev['period_date'];
												$time=$ev['period_time'];
												$img=$ev['small_img'];
												//echo $name." ".$date." ".$time."\n";
											}
									?>
				
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="images/<?php echo $img.".jpg";?>">
						</div>
						<div class="col-xs-6">
							<h4 class="product-name"><strong><?php echo $name;?></strong></h4>
							<span class="small"><strong>Време: </strong><?php echo $date."    ".$time?></span> <br />
							<span class="small"><strong>Ред: </strong><?php echo $row?>  <strong>Седиште: </strong><?php echo $seat?></span>
						</div>
						<br />
						<div class="col-xs-4" style="width: 32%">
							<div class="col-xs-8 text-right">
								<h3><strong><?php echo $price;?> ден.</strong></h3>
							</div>
							<br />
							<div class="col-xs-2 text-center ">
								<a href='<?php echo "deleteTicket.php?delId=$buybackID"?>'>
									<span class="glyphicon glyphicon-trash" style="font-size: 24px"> </span>
								</a>
							</div>
						</div>
					</div>
					<hr>
							
				<?php  } ?>	
					
				</div>							
								
							<div class="panel-footer">
								<div class="row text-center">
									<div class="col-xs-8">										
										<!-- suma na cenite na igrite -->
										<h4 class="text-right"><p id="total">Вкупно: <?php echo $totalPrice; ?> ден.</p></h4>							
									</div>
									<div class="col-xs-4">									
										 <!-- da gi brise site igri od sesija i da izvesti oti e izvrsena simulacija na kupuvanje -->
										 <form action="Checkout/paypal_ec_redirect.php" method="POST">
										      <input type="hidden" name="PAYMENTREQUEST_0_AMT" value='<?php echo $totalPrice; ?>'></input>
										      <input type="hidden" name="METHOD" value="SetExpressCheckout"></input>
										      <input type="hidden" name="currencyCodeType" value="EUR"></input>
										      <input type="hidden" name="paymentType" value="Sale"></input>
										      <!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
										      <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></input>
										</form>
									</div>
								</div>
							</div>
							
						</div>
				</div>					
		</div>

	</div>
		<!-- /.container -->



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
