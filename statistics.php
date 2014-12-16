
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
    </style>

   
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
                            <a  href="orgAdmin.php"><i class="fa fa-male fa-fw"></i> Организатори </a>
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
  <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Категории</a></li>
  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Организатори</a></li>
  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Временски период</a></li>
  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Продадени билети</a></li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane" id="home">
  	<!-- tab1 -->  	
  </div>
  <div role="tabpanel" class="tab-pane" id="profile">
	<!-- tab2 -->
  </div>
  <div role="tabpanel" class="tab-pane" id="messages">
  		<!-- tab3 -->
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
    
   
</body>
	<script src="js/jquery.js"></script>
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


