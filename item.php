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
            		$eventID=0;				
				     if (isset($_GET['ev'])) {
					    $eventID=$_GET['ev'];
					 }
            		$events=mysqli_query($link, "SELECT * FROM events WHERE eventId LIKE '$eventID'");
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
                       		$periodsID=array();
							$placeID;
							//selektiranje na detali za nastanot, potocno na lokacija, i site vreminja na nastanot
                        	$details=mysqli_query($link, "SELECT * FROM event_details WHERE event_id LIKE '$eventID'");
					   		while ($dets=mysqli_fetch_assoc($details)) {
					   			$placeID=$dets['place_id'];
								array_push($periodsID,$dets['period_id']);
							}
							//selekcija na podatoci za mestoto na odrzuvanje na nastanot so pomos na id-to za mesto zemeno od prethodnoto kveri
							$location=mysqli_query($link, "SELECT * FROM places WHERE placeId LIKE '$placeID'");
					   		while ($places=mysqli_fetch_assoc($location)) {
					   			$place=$places['place_name'];
								$adress=$places['place_address'];
						?>						
						<p><strong>Место на настанот: </strong> <?php echo $place; ?> </p>
						<p><strong>Адреса: </strong> <?php echo $adress; ?> </p>			
                             <?php } ?>           
                   	
                    </div>                    
                </div>
					 <?php } ?>	
									 
					 <div class="col-md-4 pull-left">	
					 	<label for="sel1">Одбери термин: </label>				
						<select id="sel1" class="form-control" >
							<?php
							  	//vo dropdown forma se prikazuvaat site termini vo koi ke se odrzuva nastanot
							  	for($i=0;$i<count($periodsID);$i++){
							  		$tmp=$periodsID[$i];
							  	 $per=mysqli_query($link, "SELECT * FROM periods WHERE periodId LIKE '$tmp'");
					   			 while ($periods=mysqli_fetch_assoc($per)) {
					   			 	 $pID=$periods['periodId'];
					   			 	 $period=$periods['period_date'];
									 $time=$periods['period_time']
					   			 	?>
						    <option id='<?php echo "option".$pID; ?>'><?php echo $period . " | " . $time; ?></option>
						    <?php }} ?>
						  </select>	
					</div>	
               		
               			<br />
                    <div class="text-right">
                        <a class="btn btn-info" href="#">Продолжи со одбирање место</a>
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
    <script src="js/selectPeriod.js"></script>

</body>

</html>
