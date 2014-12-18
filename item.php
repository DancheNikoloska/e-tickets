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
            	//zemanje na eventId 
            		$eventID=0;				
				     if (isset($_GET['ev'])) {
					    $eventID=$_GET['ev'];
					 }
            		$events=mysqli_query($link, "SELECT * FROM events WHERE event_id LIKE '$eventID'");
					   while ($event=mysqli_fetch_assoc($events)) {	
				?>
				<?php
				//citanje od baza za cena, data i vreme
                        		$events=mysqli_query($link, "SELECT * FROM events WHERE event_id LIKE '$eventID'");
								$event=mysqli_fetch_assoc($events);
									$time=$event['period_time'];
									$date=$event['period_date'];
									
                        		$prices=mysqli_query($link, "SELECT * FROM tickets WHERE event_id LIKE '$eventID'");
								$pr=mysqli_fetch_assoc($prices);
									$price=$pr['price'];
								
                        ?>
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                      <!--  <h4 class="pull-right">$24.99</h4> -->
                      
                      <div class="col-md-12">
                      	<div class="col-md-6">
                        <h3 class="text-left" ><a href="#"> <?php echo $event['event_name']?></a>
                        </h3>
                        </div>
                        
                        <div class="col-md-6">
                        
                          <h3 class="text-right text-primary"  ><?php echo $time.' часот' ?>
                          	  <h3 class="text-right text-primary"  ><?php echo $date; ?>
                        </h3>
                        </div>
                         <div class="col-md-12">
                        <p><?php echo $event['event_description']?></p>
                        </div>
                        
                         </div>
                         <div class="col-md-12">
                       <div class="col-md-8">
                         
					<div class="huge"> <h3>Цена на билет: <b> <?php echo $price . "денари"; ?></b></h3></div>         
                       </div>
                       
                        <div class="col-md-4 col-md-offset-0"  >
                        <h3> <a class="btn btn-info" href="chooseSeat.php">Продолжи со одбирање место</a></h3>
                    </div>  
   					
					 				
						
					</div>	
                        <?php 
                       		//$periodsID=array();
							$placeID;
							//selektiranje na detali za nastanot, potocno na lokacija, i site vreminja na nastanot
                        	//$details=mysqli_query($link, "SELECT * FROM event_details WHERE event_id LIKE '$eventID'");
					   		//while ($dets=mysqli_fetch_assoc($details)) {
					   			//$placeID=$dets['place_id'];
								//array_push($periodsID,$dets['period_id']);
							}
							//selekcija na podatoci za mestoto na odrzuvanje na nastanot so pomos na id-to za mesto zemeno od prethodnoto kveri
							//$location=mysqli_query($link, "SELECT * FROM places WHERE placeId LIKE '$placeID'");
					   	//	while ($places=mysqli_fetch_assoc($location)) {
					   		//	$place=$places['place_name'];
							//	$adress=$places['place_address'];
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

</body>

</html>
