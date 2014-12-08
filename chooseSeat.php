<!DOCTYPE html>
<html lang="en">
<?php include_once 'database.php'?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ticket Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
    
    <!--jquery-seat -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <!-- Navigation -->
    <?php
	include_once 'navBar.php';
 ?>			
    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<?php include_once 'listCategories.php'?>

            <div class="col-md-9">
           	   <div class="wrapper">
					<div class="container">
						<!--<div id="seat-map" class="col-md-6">
							<div class="front-indicator">Front</div>
					
						</div>
						<div class="booking-details col-md-3">
							<h2>Booking Details</h2>
					
							<h3> Selected Seats (<span id="counter">0</span>):</h3>
							<ul id="selected-seats"></ul>
					
							Total: <b>$<span id="total">0</span></b>
					
							<button class="checkout-button">Checkout &raquo;</button>
					
							<div id="legend"></div>
						</div> -->
						
						<?php 
							for($i=1;$i<=20;$i++){
								for($j=1;$j<=5;$j++){
									?>
									<div class="first-class col-sm-offset">
									<span>
									<input type="checkbox">
									<?php echo $j+($i); ?>
									</span>
									</div>
					 <?php			} ?>
					 
					<br />			
					<?php 		}
						 ?>
					</div>
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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/jquery.seat-charts.js"></script>		
		<script src="js/sala.js"></script>

</body>

</html>
