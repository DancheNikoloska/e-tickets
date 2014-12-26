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
            cursor: pointer;
           
        }
        .FixedHeightContainer
		{
			margin-top: -41%;
			margin-left: 55%;
  			float:left;
  			height: 470px;
  			width:260px; 
  			padding:3px; 
    		background:#d9534f;
    		border-radius: 4px;
		}
		.Content
		{
  			height:370px;
   			overflow:auto;
    		background:#fff;
		}
		.items{
			height: 50px;
			margin: 5px;
			border-radius: 3px;
			border: 3px solid grey;
			vertical-align: middle;
		}
		.items_content{
			padding-top: 0.8em;
		}
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
 

 $sql = "select * from tickets where event_id=".$_REQUEST["event_id"]." and ticket_id in (select ticket_id from boughttickets)";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=1;
 }
 $sql = "select * from tickets where event_id=".$_REQUEST["event_id"]." and ticket_id in (select ticket_id from buyback)";
 $result= mysqli_query($link,$sql);
 while($data = mysqli_fetch_assoc($result)){
   $hall[$data["row"]][$data["seat"]]=2;
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
			 echo "<span style=\"float:right;height:40px;width: 30px;\" class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>";
		    echo "</div>";
		   echo "</div>";
		   $total+=150;
        }
      ?>
    </div>
    <h4 style="margin-top: 5px;padding-left: 10px;" >Вкупно: <span id="totalPrice" style="float: right;"><?php echo $total."ден."; ?></span></h4>
    
  </div>
  <script>
 function clickMe(element,row,seat){
    //var xmlhttp = new XMLHttpRequest();
	//xmlhttp.open("GET", "update_seat.php?row="+row+"&seat="+seat);
	//xmlhttp.send();
	if(element.style.backgroundColor!='red'){
	  element.style.backgroundColor='red';
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
			"<span style=\"float:right;height:40px;width: 30px;\" class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>"
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
	  alert(tmp);
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
