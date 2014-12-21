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
	<style>
		td{
         height: 20px;
         width: 20px;
         border: 1px solid black;
         border-radius: 7px;
         font-size: 12px;
         text-align: center;
        }
        table{
        	border-spacing: 2px;
            border-collapse: separate;
            margin-left: 5%;
            margin-top: 4%;
        }
	</style>
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
					
					<table cellspacing="5" rowspacing="3">
  <?php
  
  //Nadolu kodot e strasen :D, ama mora taka ===
  //create matrix
  
  function defineHall(){
    $hall= array();
	//create rows
	
	for($i=1;$i<18;$i++){
	  $hall[$i]=array();
	}

	
	//create seats
	
	//1
	for($i=0;$i<=18;$i++){
	  $hall[1][]=0;
	}
    //2
	for($i=0;$i<=18;$i++){
	  $hall[2][]=0;
	}
	//3
	for($i=0;$i<=18;$i++){
	  $hall[3][]=0;
	}
    
	//4
	for($i=0;$i<=18;$i++){
	  $hall[4][]=0;
	}
    
	//5
	for($i=0;$i<=18;$i++){
	  $hall[5][]=0;
	}
	
	//6
	for($i=0;$i<=18;$i++){
	  $hall[6][]=0;
	}
	
	//7
	for($i=0;$i<=20;$i++){
	  $hall[7][]=0;
	}
	//8
	for($i=0;$i<=20;$i++){
	  $hall[8][]=0;
	}
	
	//9
	for($i=0;$i<=20;$i++){
	  $hall[9][]=0;
	}
	
	//10
	for($i=0;$i<=20;$i++){
	  $hall[10][]=0;
	}
	
	//11
	for($i=0;$i<=20;$i++){
	  $hall[11][]=0;
	}
	//12
	for($i=0;$i<=20;$i++){
	  $hall[12][]=0;
	}
	//13
	for($i=0;$i<=20;$i++){
	  $hall[13][]=0;
	}
	//14
	for($i=0;$i<=20;$i++){
	  $hall[14][]=0;
	}
	//15
	for($i=0;$i<=20;$i++){
	  $hall[15][]=0;
	}
	//16
	for($i=0;$i<=20;$i++){
	  $hall[16][]=0;
	}
	//17
	for($i=0;$i<=20;$i++){
	  $hall[17][]=0;
	}
	//18
	for($i=0;$i<=20;$i++){
	  $hall[18][]=0;
	}
	return $hall;
}
 
  $hall=defineHall();
 

 $sql = "select * from tickets";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=1;
 }

 
 function drawHall($hall){
 for($i=1;$i<sizeof($hall);$i++){
    echo "<tr style=\"margin-right:50%\">";
	//spacing tr
	if($i==7){
	  echo "<tr style=\"height:10px\"></tr>";
	  echo "<tr style=\"height:10px\"></tr>";
	}
	//spacing tr
	if($i==15){
	 echo "<tr style=\"height:10px;\"></tr>";
	  echo "<tr style=\"height:10px\"></tr>";
	}
	for($j=1;$j<sizeof($hall[$i]);$j++){
	
	if($i<=6){
	 //spacing td
	 if($j==3){
	   echo "<td style=\"border: white !important\"></td>";
	   echo "<td style=\"border: white !important\"></td>";
	 }
	 //spacing td
	 if($j==17){
	   echo "<td style=\"border: white !important\"></td>";
	   echo "<td style=\"border: white !important\"></td>";
	 }
	  if($hall[$i][$j]==1){
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: red;\">$j";
	   
	  echo "</td>";
	}else{
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">$j";
	  
	  echo "</td>";
	  }
	  
	}else{
	//spacing td
	  if($j==1){
	    echo "<td style=\"border: white !important\"></td>";
	  }
	   if($hall[$i][$j]==1){
	  
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: red;\">$j";
	   
	  echo "</td>";
	}else{
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">$j";
	  
	  echo "</td>";
	  }
	}
	
	}
	echo "<tr>";
	
 }}
 drawHall($hall);
  ?>

  </table>
  <script>
 function clickMe(element,row,seat){
    //var xmlhttp = new XMLHttpRequest();
	//xmlhttp.open("GET", "update_seat.php?row="+row+"&seat="+seat);
	//xmlhttp.send();
	if(element.style.backgroundColor!='red'){
	  element.style.backgroundColor='red';
	}else{
	  element.style.backgroundColor='white'
	}
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
