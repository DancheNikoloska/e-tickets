<?php
session_start();
include_once 'delete_reservations.php';
if(!empty($_SESSION['adminname'])) {

   $userAdmin=$_SESSION['adminname'];
	if(!empty($_SESSION['type'])) 
	{
		if($_SESSION['type']=="admin")
		{
			$flag=1;
		}
		else {
			$flag=0;
			header("Location: adminLogin.php");
		}
		
	}
	else {
			$flag=0;
		header("Location: adminLogin.php");
		}
   
   
   

}else{

  header("Location: adminLogin.php");
   
  $flag=0;

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
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>

    
   
</head>
<?php 
include_once 'database.php';
//citanje od podatoci od baza broj na nastani
$query=mysqli_query($link,"Select count(*) as novi_nastani from events where active='1'");
$n_nastani=mysqli_fetch_assoc($query);
$br_nastani=$n_nastani['novi_nastani'];
//citanje od podatoci od baza broj na korsnici
$query3=mysqli_query($link, "Select count(*) as korNo from users where usertype='Корисник'");
$n_kor=mysqli_fetch_assoc($query3);
$br_kor=$n_kor['korNo'];
//citanje od podatoci od baza broj na kupeni bileti
$query4=mysqli_query($link, "select distinct count(*) as sold from boughttickets");
$s=mysqli_fetch_assoc($query4);
$sold=$s['sold'];

//total events
 $query4=mysqli_query($link, "select distinct count(*) as total from events");
 $t=mysqli_fetch_assoc($query4);
$total=$t['total'];

?>
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
                <a class="navbar-brand" href="index.html" style="margin-left: 100px;">E-tickets 
                </a>
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
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a class="active" href="homeAdmin.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Настани</a>
                            
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
                    <h1 class="page-header">Почетна</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" class="col-lg-12" style="margin-top: 20px;">
            <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 col-md-8" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $br_nastani; ?></div>
                                    <div>Активни настани!</div>
                                </div>
                            </div>
                        </div>
                        <a href="eventsAdmin.php">
                            <div class="panel-footer">
                                <span class="pull-left">Детали</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8" >
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-ticket fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sold;?></div>
                                    <div>Продадени билети!</div>
                                </div>
                            </div>
                        </div>
                        <a href="statistics.php">
                            <div class="panel-footer">
                                <span class="pull-left">Детали</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
               </div>
               <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "+";?></div>
                                    <div>Додади претстава!</div>
                                </div>                              
                            </div>
                        </div>
                        <a href="addEvent.php">
                            <div class="panel-footer">
                                <span class="pull-left">Додади</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $br_kor;?></div>
                                    <div>Корисници!</div>
                                </div>
                            </div>
                        </div>
                        <a href="usersAdmin.php">
                            <div class="panel-footer">
                                <span class="pull-left">Детали</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            
            </div>
          
    </div>
            
            <!--end of col-lg-8 -->
            
            <div class="col-lg-3" style="margin-left: 25px; margin-top: -15px;">
            	<h5><b>Продадени билети за престојните 5 настани</b></h5>
            	<?php
            	
            	
			
            	//progress bars percentage
				$events=mysqli_query($link, "select distinct e.event_id, e.event_name,e.event_id from events e order by e.period_date, e.period_time limit 5");
				while ($row=mysqli_fetch_assoc($events)){
				//get tickets number
				//$query3="Select count(*) as no_tickets from tickets t, events e, event_details ed where t.details_id=ed.event_detailsId AND ed.event_id=e.eventId and e.eventId=$row[eventId]";
				//$n=mysqli_query($link, $query3);
				//$num=mysqli_fetch_assoc($n);
				$total_tickets=750;
				//$num['no_tickets'];
				//get sold tickets number
				$sold=mysqli_query($link, "Select count(*) as sold from events e, boughttickets t where e.event_id=t.event_id AND e.event_id=$row[event_id]");
				$s=mysqli_fetch_assoc($sold);
				$sold_tickets=$s['sold'];
				$percent=$sold_tickets/$total_tickets*100;
				
            	 ?>
            	 <h5><?php echo $row['event_name']; ?></h5>
	            <div class="progress">
	  			<div class="progress-bar progress-bar-info active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent."%" ?>">
	    		<span style="color:black;"><?php echo round($percent,1)."%"; ?></span>
	    		</div>
				</div>
				<?php } ?>
             </div>
              <!--end of donut chart -->
           
            <!-- /.row -->
         </div>   
            <!-- /.row -->
        </div>
        <!--end of row -->
        </div>
        <!-- /#page-wrapper -->
        
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

</html>

