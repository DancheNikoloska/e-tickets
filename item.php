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
            	<?php 
            		$eid=0;				
				     if (isset($_GET['ev'])) {
					    $eid=$_GET['ev'];
					 }
            		$events=mysqli_query($link, "SELECT * FROM events WHERE eventId LIKE '$eid'");
					   while ($event=mysqli_fetch_assoc($events)) {	
				?>
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                      <!--  <h4 class="pull-right">$24.99</h4> -->
                        <h4><a href="#"><?php echo $event['event_name'] ?></a>
                        </h4>
                        <p><?php echo $event['event_description']?></p>
                        <?php 
                        	$details=mysqli_query($link, "SELECT * FROM event_details WHERE event_id LIKE '$eid'");
					   		while ($dets=mysqli_fetch_assoc($details)) {
					   			$placeID=$dets['place_id'];
								$periodID=$dets['period_id'];
								echo "Place:"+$placeID;
								//echo "Periond:"+$periodID;
								$place=mysqli_query($link, "SELECT * FROM place WHERE placeId LIKE '$placeID'");
								while ($p=mysqli_fetch_assoc($place)) {
									
								
								?>
						<p><strong>Локација: </strong> <?php echo $p['place_name']+"      "+$p['place_address'] ?>  </p>		
						<?php	}
								$periods=mysqli_query($link, "SELECT * FROM periods WHERE periodId LIKE '$periodID'");
								while($per=mysqli_fetch_assoc($periods)){
								    
								}
							};
					   	?>
                                        
                          <div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
							    Dropdown
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
							  </ul>
						</div>
                    </div>                   
                </div>
					 <?php } ?>
               
                    <div class="text-right">
                        <a class="btn btn-success">Стави во кошничка</a>
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

</body>

</html>
