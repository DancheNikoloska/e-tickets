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
		session_start();
		include_once 'navBar.php'; 	
		?>
			
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
							  	// da se prikazuvaat 6 nastani po strana
							    $rec_limit=6;
								// vkupno nastani vo baza
								$retval = mysqli_query($link, "SELECT COUNT(*) FROM events ");
								$row       = mysqli_fetch_array($retval);
								$rec_count = $row[0];
								$offset=0;
								$numpages=($rec_count/$rec_limit)+1;
								// vo zavisnost od toa koja strana e odbrana da se presmeta offset za selektiranje podatoci od baza
								if (isset($_GET['page'])&& ($_GET['page']<=0 || $_GET['page']>=$numpages)) {
									$page   = $_GET['page'] + 1;
									$offset = $rec_limit * $page;
								} else {
									$page   = 0;
								}
								$left_rec = $rec_count - ($page * $rec_limit);
							//selekcija na site aktivni nastani za prikazuvanje
							$events=mysqli_query($link, "SELECT * FROM events LIMIT $offset, $rec_limit");
								while ($event=mysqli_fetch_assoc($events)) {
									$eventID=$event['event_id'];	
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
					
					<div class="pull-right">

					<ul class="pagination">
						<?php
						  $prevPage=$page-1; 
						  $nextPage=$page+1;
						?>
					  <li><a href='<?php echo "homeUser.php?page=$prevPage"?>'>&laquo;</a></li>
					  <?php for($i=1;$i<=$numpages;$i++){
						 ?>
					  <li><a href='<?php echo "homeUser.php?page=$i"?>'><?php echo $i; ?></a></li>
					  <?php } ?>
					  <li><a href='<?php echo "homeUser.php?page=$nextPage"?>'>&raquo;</a></li>
					  
					</ul>
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
