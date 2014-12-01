<?php
session_start();
//prvo mora da provereme dali nekoj e veke najaven, ako e prenasocuvame
if (isset($_SESSION['username'])) {
	//tuka namesto homepage ke se ide na logout ili ke se jave "you are logged in as Drn Drnko do you want to log out"
	//header("Location: homepage.html");
	$flag = 1;
} else {
	$flag = 0;
}

//inaku ne e najaven i proveruvame dali bilo klinato submit na formata
if (isset($_POST['sub'])) {
	include_once 'database.php';
	include_once 'user_validation.php';
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if (validateLogin($link, $pass, $user) == true) {
		//ovde doagjame ako ne bil prethodno najaven i e kliknato submit, i go najavuvame samo so toa so piseme u $_SESSION koj e najaven
		$_SESSION['username'] = $user;
		$q = mysqli_query($link, "SELECT * FROM users WHERE username='$user'");
		if ($q) {
			$row = mysqli_fetch_assoc($q);
			$_SESSION['user_id']=$row["id"];
		/*	if ($row['role_type'] == 'professor') {
				header('Location: dashboard.php');
			} else if ($row['role_type'] == 'admin') {
				header('Location: dashboard.php');
			} else if ($row['role_type'] == 'student') {
				header('Location: studentoverview.php');
			}*/
			
			header('Location: dashboard.php');
			//header('Location: homepage.php');
			//echo "Welcome " . $_SESSION['username'];
		} else {
			echo "err";
		}
	} else {
		
		
		print '<span style=float:right;color:red>Невалидни податоци!&nbsp </span><br>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		  <title>Е-tickets- електронски сајт за билети</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Add custom CSS here -->
		<link href="css/modern-business.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	</head>

	<body>

		<?php include_once 'navBar.php'; ?>

		<div class="container">

			<div class="row">

				<div class="col-lg-12">
					<h1 class="page-header"><small>Најавете се на e-tickets!</small></h1>

				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-responsive" src="http://wp-unit4-uk.s3.amazonaws.com/wp-content/uploads/sites/6/2013/06/Mobile-working.jpg">
				</div>
				<div class="col-md-6">

					<form method="post" role="form">
						<div class="form-group">
							<label for="username1">Корисничко име:</label>
							<input type="user" class="form-control" name="user" id="username1" placeholder="">
						</div>
						<div class="form-group">
							<label for="Password1">Лозинка:</label>
							<input type="password" class="form-control" name="pass" id="Password1" placeholder="">
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox">
								Запамети ме</input> <a href="#" class="tab"> Ја заборавивте вашата лозинка?</a> </label>
						</div>
						<button type="submit" name="sub" class="btn btn-default">
							Најава
						</button>
					</form>

				</div>

			</div>

			<!-- Team Member Profiles -->

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

			<!-- Bootstrap core JavaScript -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.js"></script>
			<script src="js/modern-business.js"></script>
	</body>
</html>