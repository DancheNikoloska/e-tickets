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
		<!--<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <!-- Navigation -->
    <?php session_start();
	if(!isset($_SESSION['username'])){
		echo "<script type='text/javascript'>alert('Морате да бидете најавени за да одберете место');</script>";
		header('Location: login.php');
		
	}
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
						
						<?php /*
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
						*/ ?>
					
					<table cellspacing="10">
						<?php
  //ZA OVA  FUNKCIJA ====================
  //create matrix
    $hall= array();
	//create 5 rows
	for($i=0;$i<11;$i++){
	  $hall[$i]=array();
	}
	
	//create seats
	
	//create 11 seats in 1 row
	for($i=0;$i<11;$i++){
	  $hall[0][]=0;
	}
	//create 4 seats in 2 row
	for($i=0;$i<4;$i++){
	  $hall[1][]=0;
	}
	//create 7 seats in 3 row
	for($i=0;$i<7;$i++){
	  $hall[2][]=0;
	}
	//create 7 seats in 4 row
	for($i=0;$i<7;$i++){
	  $hall[3][]=0;
	}
	//create 2 seats in 5 row
	for($i=0;$i<2;$i++){
	  $hall[4][]=0;
	}
	//create 7 seats in 6 row
	for($i=0;$i<7;$i++){
	  $hall[5][]=0;
	}
	//create 4 seats in 7 row
	for($i=0;$i<4;$i++){
	  $hall[6][]=0;
	}
	//create 2 seats in 8 row
	for($i=0;$i<2;$i++){
	  $hall[7][]=0;
	}
	//create 9 seats in 9 row
	for($i=0;$i<9;$i++){
	  $hall[8][]=0;
	}
	//create 9 seats in 10 row
	for($i=0;$i<9;$i++){
	  $hall[9][]=0;
	}
	//create 9 seats in 11 row
	for($i=0;$i<9;$i++){
	  $hall[10][]=0;
	}
 
 
  
 
 $conn=mysqli_connect('localhost','root','','e-tickets');
 $sql = "select * from tickets";
 $result= mysqli_query($conn,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=1;
 }

 
 
 //draw hall
 for($i=0;$i<sizeof($hall);$i++){
    echo "<tr>";
	for($j=0;$j<sizeof($hall[$i]);$j++){
	if($hall[$i][$j]==1){
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: red;\">";
	   
	  echo "</td>";
	}else{
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">";
	  
	  echo "</td>";
	  }
	}
	echo "<tr>";
 }
  ?>

  </table>
  <script>
 function clickMe(element,row,seat){
    //var xmlhttp = new XMLHttpRequest();
	//xmlhttp.open("GET", "update_seat.php?row="+row+"&seat="+seat);
	//xmlhttp.send();
	element.style.background= 'red';
 };
</script>
					
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
		<!--<script src="js/jquery.seat-charts.js"></script>-->		
		<!--<script src="js/sala.js"></script>-->

</body>

</html>
