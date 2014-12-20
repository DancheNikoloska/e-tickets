<!DOCTYPE html>
<?php include_once 'database.php'?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-tickets Shop</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/shop-homepage.css" rel="stylesheet">
	</head>

	<body>

		<!-- Navigation -->
		<?php 
		session_start();
		include_once 'navBar.php'; 	
		?>
			
		<!-- Page Content style="margin-top:100px;" -->
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<form >
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="panel-title">
									<div class="row">
										<div class="col-xs-6">
											<h5><span class="glyphicon glyphicon-shopping-cart"></span> Купувачка кошничка</h5>
										</div>
										<div class="col-xs-6">
											<!--redirect do welcome-->
											<a href="userHome.php" class="btn btn-primary btn-sm btn-block">
												 <span class="glyphicon glyphicon-share-alt"></span>Продолжи со купување</a>
										</div>
									</div>
								</div>
							</div>
								
							<div class="panel-body" runat="server" id="div">								
									<!-- red/igra-->
									
									<hr>
							</div>
								
								
							<div class="panel-footer">
								<div class="row text-center">
									<div class="col-xs-9">										
										<!-- suma na cenite na igrite -->
										<h4 class="text-right"><p id="total">Вкупно: 2 ден.</p></h4>							
									</div>
									<div class="col-xs-3">									
										 <!-- da gi brise site igri od sesija i da izvesti oti e izvrsena simulacija na kupuvanje -->
										 <a id="btnBuy"    class="btn btn-success btn-block"> Купи </a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>					
		</div>

	</div>
		<!-- /.container -->



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
