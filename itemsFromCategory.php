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
		<?php session_start();
			include_once 'navBar.php'; ?>
			
		<!-- Page Content -->
		<div class="container">
			<div class="row">

				<?php include_once 'listCategories.php' ?>
				<div class="col-md-9">
					
					<div class="row">
							<?php
							  	// da se prikazuvaat 6 nastani po strana	
							   $num_rec_per_page=6;							
								if (isset($_GET["page"])) {
									 $page  = $_GET["page"]; 
								} else {
								    $page=1; }	
								$start_from = ($page-1) * $num_rec_per_page; 								

							// selekcija na site aktivni nastani od odbranata kategorija
							$events=mysqli_query($link, "SELECT * FROM events WHERE genre_id LIKE '$id' AND active LIKE 1 LIMIT $start_from, $num_rec_per_page");
								while ($event=mysqli_fetch_assoc($events)) {
									$eventID=$event['event_id'];		
							?>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<img src="http://placehold.it/320x150" alt="">
								<div class="caption">
									<!--<h4 class="pull-right">$24.99</h4>  &id=$id-->
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
						
						<?php //izbroj kolku zapisi ima vkupno vo tabelata
							$rs_result = mysqli_query($link,"SELECT * FROM events WHERE genre_id LIKE '$id' AND active LIKE 1"); //run the query
							$total_records = mysqli_num_rows($rs_result);  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page); 
						?>
					<!-- prva strana -->
					  <li><a href='<?php echo "itemsFromCategory.php?page=1&id=$id"?>'>&laquo;</a></li>
					  <?php for($i=1;$i<=$total_pages;$i++){
						 ?>
					  <li><a href='<?php echo "itemsFromCategory.php?page=$i&id=$id"?>'><?php echo $i; ?></a></li>
					  <?php } ?>
					  <!-- posledna strana -->
					  <li><a href='<?php echo "itemsFromCategory.php?page=$total_pages&id=$id"?>'>&raquo;</a></li>
					  
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
