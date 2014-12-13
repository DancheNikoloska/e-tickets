
<?php
session_start();

if(!empty($_SESSION['username'])) {

   $user=$_SESSION['username'];
   $_SESSION["type"]="admin";
   $flag=1;

}else{

  $user="Најавете се!";
   
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

   
</head>
<?php 
include_once 'database.php';
$query=mysqli_query($link,"Select count(*) as novi_nastani from events where activated=0");
$n_nastani=mysqli_fetch_assoc($query);
$br_nastani=$n_nastani['novi_nastani'];


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
            	<li>
            		<?php if ($user=="Најавете се!")
                	echo '<a href="adminLogin.php">Најавете се!</a>';
					else
                	echo '<a href="#">'. $user .'</a>'; ?>
            	</li>
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
                            <a href="#"><i class="fa fa-male fa-fw"></i> Организатори </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
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
            <div class="row" class="col-lg-12">
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
                                    <div>Нови настани!</div>
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
                                    <div class="huge">+12</div>
                                    <div>Продадени билети!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
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
                                    <div class="huge">3</div>
                                    <div>Нови организатори!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Детали</span>
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
                                    <div class="huge">17</div>
                                    <div>Нови корисници!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Детали</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            
            </div>
            <!-- diagram -->
            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Број на продадени билети по месеци
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
            
            <!--end od col-lg-8 -->
            <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Продадени билети за престојните 5 настани
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
    
   
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
     <script>
    	
<?php 
include_once 'database.php';
//donut
$q=mysqli_query($link,"select distinct e.event_name,e.eventId from events e, event_details ed, periods p where e.eventId=ed.event_id and ed.period_id=p.periodId order by p.period_date, p.period_time limit 5");
$ar=array();
while($row=mysqli_fetch_assoc($q))
{
	array_push($ar,$row['event_name']);
}
$sold=mysqli_query($link, "Select count(*) as sold from events e, periods p, event_details ed, tickets t, has_ticket ht where e.eventId=ed.event_id AND ed.event_detailsId=t.details_id AND t.ticket_id=ht.ticket_id and p.periodId=ed.period_id group by e.eventId order by p.period_date,p.period_time limit 5");
$ar_t=array();
while($s=mysqli_fetch_assoc($sold)){
array_push($ar_t,$s['sold']);
}
//diagram 
//oktomvri
$d=mysqli_query($link, "select c.category_name, count(*) as sold from categories c, events e, event_details ed, tickets t, has_ticket ht, periods p where c.categoryId=e.category_id and e.eventId=ed.event_id and ed.period_id=p.periodId and t.details_id=ed.event_detailsId and t.ticket_id=ht.ticket_id and p.period_date between '2015-10-01' and '2015-11-01' group by c.category_name");
$oktomvri = array("Спорт"=>"0", "Музика"=>"0", "Кино"=>"0", "Театар"=>"0");
while($row=mysqli_fetch_assoc($d))
{
	if ($row['category_name']=='Спорт') {$oktomvri['Спорт']=$row['sold'];}
	if ($row['category_name']=='Музика') {$oktomvri['Музика']=$row['sold'];}
	if ($row['category_name']=='Кино') {$oktomvri['Кино']=$row['sold'];}
	if ($row['category_name']=='Театар') {$oktomvri['Театар']=$row['sold'];}
	
}
//noemvri
$d=mysqli_query($link, "select c.category_name, count(*) as sold from categories c, events e, event_details ed, tickets t, has_ticket ht, periods p where c.categoryId=e.category_id and e.eventId=ed.event_id and ed.period_id=p.periodId and t.details_id=ed.event_detailsId and t.ticket_id=ht.ticket_id and p.period_date between '2015-11-01' and '2015-12-01' group by c.category_name");
$noemvri = array("Спорт"=>"0", "Музика"=>"0", "Кино"=>"0", "Театар"=>"0");
while($row=mysqli_fetch_assoc($d))
{
	if ($row['category_name']=='Спорт') {$noemvri['Спорт']=$row['sold'];}
	if ($row['category_name']=='Музика') {$noemvri['Музика']=$row['sold'];}
	if ($row['category_name']=='Кино') {$noemvri['Кино']=$row['sold'];}
	if ($row['category_name']=='Театар') {$noemvri['Театар']=$row['sold'];}
	
}
//dekemvri
$d=mysqli_query($link, "select c.category_name, count(*) as sold from categories c, events e, event_details ed, tickets t, has_ticket ht, periods p where c.categoryId=e.category_id and e.eventId=ed.event_id and ed.period_id=p.periodId and t.details_id=ed.event_detailsId and t.ticket_id=ht.ticket_id and p.period_date between '2014-12-01' and '2015-01-01' group by c.category_name");
$dekemvri = array("Спорт"=>"0", "Музика"=>"0", "Кино"=>"0", "Театар"=>"0");
while($row=mysqli_fetch_assoc($d))
{
	if ($row['category_name']=='Спорт') {$dekemvri['Спорт']=$row['sold'];}
	if ($row['category_name']=='Музика') {$dekemvri['Музика']=$row['sold'];}
	if ($row['category_name']=='Кино') {$dekemvri['Кино']=$row['sold'];}
	if ($row['category_name']=='Театар') {$dekemvri['Театар']=$row['sold'];}
	
}
//januari
$d=mysqli_query($link, "select c.category_name, count(*) as sold from categories c, events e, event_details ed, tickets t, has_ticket ht, periods p where c.categoryId=e.category_id and e.eventId=ed.event_id and ed.period_id=p.periodId and t.details_id=ed.event_detailsId and t.ticket_id=ht.ticket_id and p.period_date between '2015-01-01' and '2015-02-01' group by c.category_name");
$januari = array("Спорт"=>"0", "Музика"=>"0", "Кино"=>"0", "Театар"=>"0");
while($row=mysqli_fetch_assoc($d))
{
	if ($row['category_name']=='Спорт') {$januari['Спорт']=$row['sold'];}
	if ($row['category_name']=='Музика') {$januari['Музика']=$row['sold'];}
	if ($row['category_name']=='Кино') {$januari['Кино']=$row['sold'];}
	if ($row['category_name']=='Театар') {$januari['Театар']=$row['sold'];}
	
}

?>


    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: '<?php echo $ar[0]; ?>',
            value: '<?php echo $ar_t[0]; ?>'
        }, {
            label: '<?php echo $ar[1]; ?>',
            value: '<?php echo $ar_t[1]; ?>'
        }, {
            label: '<?php echo $ar[2]; ?>',
            value: '<?php echo $ar_t[2]; ?>'
        }, {
            label: '<?php echo $ar[3]; ?>',
            value: '<?php echo $ar_t[3]; ?>'
        }, {
            label: '<?php echo $ar[4]; ?>',
            value: '<?php echo $ar_t[4]; ?>'
        }],
        resize: true
    });

   



    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: 'Октомври 2014',
            sport: '<?php echo $oktomvri['Спорт']; ?>',
            muzika: '<?php echo $oktomvri['Музика']; ?>',
            kino: '<?php echo $oktomvri['Кино']; ?>',
            teatar: '<?php echo $oktomvri['Театар']; ?>'
        }, {
            period: 'Ноември 2014',
             sport: '<?php echo $noemvri['Спорт']; ?>',
            muzika: '<?php echo $noemvri['Музика']; ?>',
            kino: '<?php echo $noemvri['Кино']; ?>',
            teatar: '<?php echo $noemvri['Театар']; ?>'
            
        }, {
            period: 'Декември 2014',
            sport: '<?php echo $dekemvri['Спорт']; ?>',
            muzika: '<?php echo $dekemvri['Музика']; ?>',
            kino: '<?php echo $dekemvri['Кино']; ?>',
            teatar: '<?php echo $dekemvri['Театар']; ?>'
        }, {
            period: 'Јануари 2014',
            sport: '<?php echo $januari['Спорт']; ?>',
            muzika: '<?php echo $januari['Музика']; ?>',
            kino: '<?php echo $januari['Кино']; ?>',
            teatar: '<?php echo $januari['Театар']; ?>'
        }],
        xkey: 'period',
        ykeys: ['sport', 'muzika', 'kino','teatar'],
        labels: ['Спорт', 'Музика', 'Кино','Театар'],
        pointSize: 2,
        hideHover: 'auto',
        parseTime: false,
        resize: true
    });


    </script>
    
</html>

