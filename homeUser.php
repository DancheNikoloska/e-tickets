<!DOCTYPE html>
<?php include_once 'database.php'?>
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
			include_once 'navBar.php'; ?>
			
		<!-- Page Content -->
		<div class="container">
			<div class="row">

				<?php include_once 'listCategories.php'?>

				<div class="col-md-9">

					<div class="row carousel-holder">

						<div class="col-md-12">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img class="slide-image" src="http://placehold.it/800x300" alt="">
									</div>
									<div class="item">
										<img class="slide-image" src="http://placehold.it/800x300" alt="">
									</div>
									<div class="item">
										<img class="slide-image" src="http://placehold.it/800x300" alt="">
									</div>
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
							</div>
						</div>

					</div>

					<div class="row">
							<?php 
							//selekcija na site aktivni nastani za prikazuvanje
							$events=mysqli_query($link, "SELECT * FROM events WHERE activated LIKE 1");
								while ($event=mysqli_fetch_assoc($events)) {
									$eventID=$event['eventId'];	
							?>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<img src="http://placehold.it/320x150" alt="">
								<div class="caption">
									<!--<h4 class="pull-right">$24.99</h4> -->
									<h4><a href='<?php echo "item.php?ev=$eventID&id=$id"?>'><?php echo $event['event_name'] ?></a></h4>
									<p>
										<?php echo $event['event_description']?>
									</p>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div>

				</div>

			</div>

		</div>
		<!-- /.container -->

		<div class="container">

			<hr>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>
							Copyright &copy; Your Website 2014
						</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
