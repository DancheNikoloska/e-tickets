<?php
session_start();
 include_once 'delete_reservations.php';
if(!empty($_SESSION['adminname'])) {

   $user=$_SESSION['adminname'];
   $_SESSION["type"]="admin";
   $flag=1;

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
    <style>
    	a:hover,a:focus {text-decoration: none;}
    	.highcharts-button{visibility: hidden;}
    </style>
<script src="js/jquery.js"></script>
<script src="js/highcharts1.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

   
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
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Настани</a>
                            
                        </li>
                  
                        <li>
                            <a href="usersAdmin.php"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a class="active" href="statistics.php"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
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
                    <h1 class="page-header" style="margin-left: 15px;">Статистики</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
<!--toggle navigation -->
<!--tabs-->
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Најгледани претстави</a></li>
  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Префериран драмски вид</a></li>
  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Продадени билети</a></li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane" id="home">
  	<!-- tab1 -->  
  	<br>
  		<div class="panel panel-default">
  			<div class="panel-heading">
  				Најгледани претстави
  				</div>
  	<div id="bar" style="width: 800px; height: 400px;"></div>
  </div>
  </div>
  <div role="tabpanel" class="tab-pane" id="messages">
  		<!-- tab2 -->
  		<br>
  		<div class="panel panel-default">
  			<div class="panel-heading">
                            Префериран драмски вид
            </div>
  		<div id="container" style="height: 400px; width: 800px"></div>	
  		</div>
  </div>
  
  <div role="tabpanel" class="tab-pane active" id="settings">
  		 <!-- diagram -->
            <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Број на продадени билети месечно
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

             <!--end of diagram-->
  </div>
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
	
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
  	<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
	</script>

<script>

<?php
include_once 'database.php';

//get sold tickets for october
$q3=mysqli_query($link, "select count(*) as sold from boughttickets bt, events e where bt.event_id=e.event_id and e.period_date > '2014-09-31' and e.period_date < '2014-11-01'");
$row3=mysqli_fetch_assoc($q3);
$soldOct=$row3['sold'];
 //get sold tickets for november
$q4=mysqli_query($link, "select count(*) as sold from boughttickets bt, events e where bt.event_id=e.event_id and e.period_date > '2014-10-31' and e.period_date < '2014-12-01'");
$row4=mysqli_fetch_assoc($q4);
$soldNov=$row4['sold'];
//get sold tickets for december
$q5=mysqli_query($link, "select count(*) as sold from boughttickets bt, events e where bt.event_id=e.event_id and e.period_date > '2014-11-31' and e.period_date < '2015-01-01'");
$row5=mysqli_fetch_assoc($q5);
$soldDec=$row5['sold'];
//get sold tickets for january
$q=mysqli_query($link, "select count(*) as sold from boughttickets bt, events e where bt.event_id=e.event_id and e.period_date > '2014-12-31' and e.period_date < '2015-02-01'");
$row1=mysqli_fetch_assoc($q);
$soldJan=$row1['sold'];
//get sold tickets for february
$q2=mysqli_query($link, "select count(*) as sold from boughttickets bt, events e where bt.event_id=e.event_id and e.period_date > '2015-01-31' and e.period_date < '2015-03-01'");
$row2=mysqli_fetch_assoc($q2);
$soldFev=$row2['sold'];
?>

//pie chart data
<?php 
include_once 'database.php';
$komedija=mysqli_query($link, "select count(*) as komedija from boughttickets bt, events e, genres g where bt.event_id=e.event_id and e.genre_id=g.id and g.name='Комедија'");
$row1=mysqli_fetch_assoc($komedija);
$kom=$row1['komedija'];
$tragedija=mysqli_query($link, "select count(*) as tragedija from boughttickets bt, events e, genres g where bt.event_id=e.event_id and e.genre_id=g.id and g.name='Трагедија'");
$row2=mysqli_fetch_assoc($tragedija);
$tr=$row2['tragedija'];
$tk=mysqli_query($link, "select count(*) as tk from boughttickets bt, events e, genres g where bt.event_id=e.event_id and e.genre_id=g.id and g.name='Трагикомедија'");
$row3=mysqli_fetch_assoc($tk);
$tkom=$row3['tk'];
$drama=mysqli_query($link, "select count(*) as drama from boughttickets bt, events e, genres g where bt.event_id=e.event_id and e.genre_id=g.id and g.name='Драма'");
$row4=mysqli_fetch_assoc($drama);
$dr=$row4['drama'];
?>

<!--horizontal bar data-->
<?php 
$totalevents=mysqli_query($link,"select e.event_name as name, count(*) as tickets from events e, boughttickets bt where e.event_id=bt.event_id group by e.event_name order by tickets desc");
//$rowEvents=mysqli_fetch_assoc($totalevents);
$arrayEvents=array();
$arrayTickets=array();
while($row=mysqli_fetch_assoc($totalevents))
{
	array_push($arrayEvents,$row['name']);
	array_push($arrayTickets,$row['tickets']);
}

?>

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: 'Октомври 2014',
            bileti: '<?php echo $soldOct; ?>',
           
        }, {
            period: 'Ноември 2014',
             bileti: '<?php echo $soldNov; ?>',
            
            
        }, {
            period: 'Декември 2014',
            bileti: '<?php echo $soldDec; ?>',
            
        }, {
            period: 'Јануари 2015',
            bileti: '<?php echo $soldJan; ?>',
           
        },
        {
            period: 'Февруари 2014',
            bileti: '<?php echo $soldFev;?>',
           
        }],
        xkey: 'period',
        ykeys: ['bileti'],
        labels: ['Вкупно продадени билети'],
        pointSize: 2,
        hideHover: 'auto',
        parseTime: false,
        resize: true
    });
	</script>
    <script>
    	function func (st) {
    		document.getElementById(st).style.color = "blue";
		  
		}
    </script>
    <script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: [
                    ['Комедија',   <?php echo $kom; ?>],
                    ['Трагедија',       <?php echo $tr;?>],
                    ['Трагикомедија',    <?php echo $tkom;?>],
                    ['Драма',    <?php echo $dr;?>]
                    
                ]
            }]
        });
    });

});
</script>
<script>
	$(function () {
    $('#bar').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        tooltip: {
                pointFormat: '<b></b>'
              },
        xAxis: {
            categories: [
            <?php 
            $count = count($arrayEvents);
			for ($i = 0; $i < $count; $i++) {
			echo "'".$arrayEvents[$i]."'".", ";
			}
            ?>
            ],
            
        },
        yAxis: {
        	min:0,
           tickInterval: 1            
        },
       
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        
        credits: {
            enabled: false
        },
        series: [{
            name: 'Вкупно продадени билети',
            data: [<?php 
            $count = count($arrayTickets);
			for ($i = 0; $i < $count; $i++) {
			echo $arrayTickets[$i].", ";
			}
            
            ?>]
          				
        }]
    });
});

</script>
</html>


