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
    <?php include_once 'navBar.php'; ?>			
    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<?php include_once 'listCategories.php'?>

            <div class="col-md-9">
            	<?php 
            		$eid=0;				
				     if (isset($_GET['ev'])) {
				     	echo $_GET['ev'];
					    $eid=$_GET['ev'];
					 }
						 echo  $eid;
            		$events=mysqli_query($link, "SELECT * FROM events WHERE eventId LIKE '$eid'");
					   while ($event=mysqli_fetch_assoc($events)) {
					   	echo $events['eventId'];	
				?>
                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                      <!--  <h4 class="pull-right">$24.99</h4> -->
                        <h4><a href="#"><?php echo $event['event_name'] ?></a>
                        </h4>
                        <p><?php echo $event['event_description']?></p>
                        <p>Want to make these reviews work? Check out
                            <strong><a href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this building a review system tutorial</a>
                            </strong>over at maxoffsky.com!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>                   
                </div>
					 <?php }?>
                <div class="well">
                    <div class="text-right">
                        <a class="btn btn-success">Стави во кошничка</a>
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

</body>

</html>
