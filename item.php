<!DOCTYPE html>
<html lang="en">
<?php include_once 'database.php';
 include_once 'delete_reservations.php';?>
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
    <?php session_start();
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
									//formatiranje za poubav prikaz na casot, da ne pokazuva i sekundi 
								$timeFormated=substr($time, 0, -3);
								
                        ?>
			<div class="thumbnail">
                    <img class="img-responsive" src="images/<?php echo $event['big_img'].".jpg";?>" alt="http://placehold.it/800x300"/>
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $price . "денари"; ?></h4>
                        <h4><a><?php echo $event['event_name']?></a></h4>
                        <h4 class="text-info" ><?php echo "Датум: ".$date."  | ".$timeFormated.' часот' ?></h4>
                        <p><?php echo $event['event_description']?></p>
                    </div>
                      <div class="col-md-4 pull-left"  >
                        <h3> <a class="btn btn-info" href="homeUser.php">Назад</a></h3>
                    </div> 
                    <div class="col-md-4 pull-right"  >
                        <h3> <a class="btn btn-info" href="chooseSeat.php?event_id=<?php echo $event['event_id'];?>">Продолжи со одбирање место</a></h3>
                    </div>  
 
                </div>	
                <?php }?>                
           

            </div>

        </div>

    </div>
    
    
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
