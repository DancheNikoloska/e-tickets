
<!DOCTYPE html>
<html lang="en">
<?php include_once 'database.php'?>
<?php
//delete all reservations older than 30 min
 include_once 'delete_reservations.php';
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ticket Shop</title>
    
    <!-- jquery -->
    <script src="js/jquery.js" ></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
    
    <!--jquery-seat -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
		<!--<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		@import url('css/seats.css');
	</style>
</head>

<body>

    <!-- Navigation -->
    <?php session_start();
	if(!isset($_SESSION['username']) || !isset($_REQUEST["event_id"])){
		echo "<script type='text/javascript'>alert('Морате да бидете најавени за да одберете место');</script>";
		header('Location: login.php');
		
	}
	include_once 'navBar.php';
	
	//ensure user_id is in session
	  $q = mysqli_query($link, "SELECT * FROM users WHERE username='".$_SESSION["username"]."'");
		
		 $row = mysqli_fetch_assoc($q);
		 $_SESSION['user_id']=$row["user_id"];
		
 ?>	 
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<?php include_once 'listCategories.php'?>

            <div class="col-md-9">
           	   <div class="wrapper">
					<div class="container">
					
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
 
 //get bought tickets
 $sql = "select * from tickets where event_id=".$_REQUEST["event_id"]." and ticket_id in (select ticket_id from boughttickets)";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=1;
 }
 
 //get tickets reserved by the same user
 $sql = "select * from tickets where event_id=".$_REQUEST["event_id"]." and ticket_id in (select ticket_id from buyback where user_id=".$_SESSION["user_id"].")";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=2;
 }
 
 //get tickets reserved by another user
 $sql = "select * from tickets where event_id=".$_REQUEST["event_id"]." and ticket_id not in (select ticket_id from buyback where user_id=".$_SESSION["user_id"].") and ticket_id in (select ticket_id from buyback)";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=3;
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
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: grey;\">$j";
	   
	  echo "</td>";
	}else if($hall[$i][$j]==2){
		echo "<td row=\"".$i."\" style=\"background: red;\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">$j";
	  
	    echo "</td>";
	}
	else if($hall[$i][$j]==3){
	  	echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: grey;\">$j";
	  
	    echo "</td>";
	}
	else{
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">$j";
	  
	  echo "</td>";
	  }
	  
	}else{
	//spacing td
	  if($j==1){
	    echo "<td style=\"border: white !important\"></td>";
	  }
	  
	  
	   if($hall[$i][$j]==1){
	  
	  echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: grey;\">$j";
	   
	  echo "</td>";
	}else if($hall[$i][$j]==2){
		echo "<td row=\"".$i."\" style=\"background: red;\" seat=\"".$j."\" onclick=\"clickMe(this,".$i.",".$j.")\">$j";
	  
	    echo "</td>";
	}
	else if($hall[$i][$j]==3){
	  	echo "<td row=\"".$i."\" seat=\"".$j."\" onclick=\"return false;\" style=\"background: grey;\">$j";
	  
	    echo "</td>";
	}
	else{
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
  <div class="FixedHeightContainer">
   <h2>Избрани седишта</h2>
    <div class="Content" id="contentTickets">
      <?php
        //get user
         $q = mysqli_query($link, "SELECT * FROM users WHERE username='".$_SESSION["username"]."'");
		
		 $row = mysqli_fetch_assoc($q);
		 $_SESSION['user_id']=$row["user_id"];
		
		 
        
        
		$sql = ("SELECT * FROM buyback,tickets where buyback.ticket_id=tickets.ticket_id and buyback.user_id=".$_SESSION["user_id"]." and tickets.event_id=".$_REQUEST["event_id"]);
         $result= mysqli_query($link,$sql);
		 $total=0;
         while($data = mysqli_fetch_assoc($result)){
           echo "<div id=".$data["row"]."-".$data["seat"]." class=\"items\">";
			echo "<div class=\"items_content\">";
			 echo "<span>&nbsp&nbsp&nbsp&nbspРед:".$data["row"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>";
			 echo "Седиште:". $data["seat"]; 
			 echo "<span onclick=\"deleteItem(".$data["seat"].",".$data["row"].",".$_REQUEST["event_id"].")\" style=\"cursor:pointer;float:right;height:40px;width: 30px;\" class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>";
		    echo "</div>";
		   echo "</div>";
		   $total+=150;
        }
      ?>
    </div>
    <h4 style="margin-top: 5px;padding-left: 10px;" >Вкупно: <span id="totalPrice" style="float: right;"><?php echo $total."ден."; ?></span></h4>
    
  </div>
  <script>
 function deleteItem(seat,row,event){
 	var xmlhttp = new XMLHttpRequest();
	  var tmp= ("update_seat.php?row="+row+"&seat="+seat+"&user_id="+String(<?php echo $_SESSION['user_id']; ?>)+"&event_id="+String(<?php echo $_REQUEST["event_id"]; ?>)+"&status=0");
	  xmlhttp.open("GET", tmp);
	  //alert(tmp);
	  xmlhttp.send();
	 location.reload();
 }
 function clickMe(element,row,seat){

	if(element.style.backgroundColor!='red'){
	  element.style.backgroundColor="red";
	  //add in buyback database
	  var xmlhttp = new XMLHttpRequest();
	  var tmp1= ("update_seat.php?row="+row+"&seat="+seat+"&user_id="+<?php echo $_SESSION['user_id']; ?>+"&event_id="+<?php echo $_REQUEST["event_id"]; ?>+"&status=1");
	  xmlhttp.open("GET", tmp1);
	  
	  xmlhttp.send();
	  //update right div
	  var ticket=$(
	    "<div id="+row+"-"+seat+" class=\"items\">"
			+"<div class=\"items_content\">"+
			"<span>&nbsp&nbsp&nbsp&nbspРед:"+row+"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>"
			+"Седиште:" +seat+
			"<span onclick=\"deleteItem("+seat+","+row+","+<?php echo $_REQUEST["event_id"];?>+")\" style=\"cursor:pointer;float:right;height:40px;width: 30px;\" class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>"
		    +"</div>"
		   +"</div>"
	  );
	  $("#contentTickets").append(ticket);
	  //update vkupno
	  var val1=parseInt($("#totalPrice").text());
	  val1+=150;
	  document.getElementById("totalPrice").innerText=(val1+"ден.");
	}else{
	  
	  element.style.backgroundColor='white';
	  //remove from buyback database
	  var xmlhttp = new XMLHttpRequest();
	  var tmp= ("update_seat.php?row="+row+"&seat="+seat+"&user_id="+String(<?php echo $_SESSION['user_id']; ?>)+"&event_id="+String(<?php echo $_REQUEST["event_id"]; ?>)+"&status=0");
	  xmlhttp.open("GET", tmp);
	  //alert(tmp);
	  xmlhttp.send();
	  //update right div
	  $("#"+row+"-"+seat).remove();
	  //update vkupno
	  var val1=parseInt($("#totalPrice").text());
	  val1-=150;
	  document.getElementById("totalPrice").innerText=(val1+"ден.");
	}
 };
</script>
					
					</div>
				</div>
			</div>                    
  

      </div>

   </div>
    <!-- /.container -->
     <div id="legend">
    	<div style="display:inline-block;height: 20px;width: 20px;background: grey;border-radius: 5px;margin-right:3px;"></div>
    	 <span>Зафатени</span><br>
    	<div style="display:inline-block;height: 20px;width: 20px;background: red;border-radius: 5px;margin-right:3px;"></div>
    	 <span>Резервирани од Вас*</span> <br>
    	
    	 <hr style="width: 245px; margin: 2px;">
    	<div style="color: red;margin-top: 7px;width: 10%;display:inline;">*Резервациите се бришат по 30 минути доколку билетот не се купи.</div>
    </div>	
    
    <a href="shoppingCart.php" style="width: 10em;color: #222222;font-weight:bold; float: right; margin-right: 107px;margin-top: 5px;" class="btn btn-danger">Резервирај</a>
    
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
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<!--<script src="js/jquery.seat-charts.js"></script>-->		
		<!--<script src="js/sala.js"></script>-->

</body>

</html>
