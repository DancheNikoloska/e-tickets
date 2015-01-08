<?php


session_start();
$f=false;
if(!empty($_SESSION['adminname'])) {

   $user=$_SESSION['adminname'];
   $_SESSION["type"]="admin";
   $flag=1;

}else{

  header("Location: adminLogin.php");
   
  $flag=0;

}
//se zema event id
if (isset($_GET['eventid'])){
$eventid=$_GET['eventid'];
$_SESSION['eventid']=$_GET['eventid'];
}
//echo $eventid;
include_once 'database.php';

//proverka na kod
if (isset($_POST["code"]))
{
	$code=$_POST["code"];
	$eventid=$_SESSION['eventid'];
	
	$query="select * from events e, tickets t where e.event_id=t.event_id and t.code='$code' and e.event_id='$eventid'";
	$q=mysqli_query($link, $query);
	//if ($q) echo "ok"; else echo mysqli_error($link);
	if(mysqli_num_rows($q)==1)
 		{$f=true;}
	else {$f=false;}
	
}
else {
	$code="";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>homeAdmin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;border:0px; width:1280px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="margin-left: 100px;">E-tickets Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php	if ($flag==1){ ?>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                        
                            <a href="logout.php">
                                Logout
                            </a>
                        <?php   } ?>
                          
                        </li>
                    </ul>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links-->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a class="active" href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Настани</a>
                            
                        </li>
                    
                        <li>
                            <a href="usersAdmin.php"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a href="statistics.php"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
                        </li>
                                               
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="width: 900px; margin-left: 350px;">
        	<div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-left: 25px;">Проверка на кодови</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   <?php
   $eventid=$_SESSION['eventid'];
   $query=mysqli_query($link,"Select * from events where event_id=$eventid");
   $row=mysqli_fetch_assoc($query);
   $eventname=$row['event_name'];
   $period_date=$row['period_date'];
   $time=$row['period_time'];
   $img=$row['big_img'];
   
   ?>
            <div class="col-md-12">

           <div class="col-md-8">
           	
         <?php 
         
         echo  "<img width=\"520px;\" src=\"images/$img\"><br><br>";
		 echo "<h3>$eventname</h3>";
		 echo "<h4>Датум: $period_date</h4>";
		 echo "<h4>Време: $time</h4>";
		 
		 
		
		 
		 
         
         
         ?>
          
         </div>
           <div class="col-md-4" style="margin-top: -20px;">
           	<h3>Пребарај билет</h3><br>
           	<form action="ticketsChecking.php" method="post">
           	<input class="form-control" type="text" id="code" name="code"><br>
           	<input type="submit" class="btn btn-primary" id="submit" value="Пребарај" style="float: right;"></input> <br>
           	 </form> 
           	 <br>
           	 <?php
           	 if (isset($_POST["code"])){
           	 if ($f==true){
          echo   "<i class=\"glyphicon glyphicon-ok-circle huge\" style=\"color:green;\"></i>"; 
			 }
			 else
			 	{
          echo  "<i class=\"glyphicon glyphicon-remove-circle huge\" style=\"color:red\";></i>"; 
				}
			 }    
                    
             ?> 
            
           	
           	
           	
           </div>
           
           
            <!-- /.row -->
         </div>   
            <!-- /.row -->
        </div>
        <!--end of row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

  <!-- jQuery -->
    
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
   
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
  
    
</html>

