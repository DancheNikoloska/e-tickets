<?php
 include_once 'delete_reservations.php';
include_once 'database.php';
$flaguser = $flagemail = $flagloz = $flagloz2 = 1;
session_start();
if (isset($_POST['submit'])) {
	include 'user_validation.php';
	//promenlivi
	$user = $_POST['user'];
	$lozinka = $_POST['pass'];
	$lozinka2 = $_POST['pass2'];
	$email = $_POST['email'];
	$tip = $_POST['role'];
	if ($tip == "Корисник") {$tip = "korisnik";
	}

	//if ($tip == "Студент") {$tip="student";}
	if (!validateUsername($link, $user))
		$flaguser = 0;
	if (!validateEmail($link, $email))
		$flagemail = 0;
	if (!validatePassword($link, $lozinka))
		$flagloz = 0;
	if ($lozinka != $lozinka2)
		$flagloz2 = 0;
	if ($flaguser && $flagemail && $flagloz && $flagloz2)
	 {	$salt = "baklava";
		//$lozinka = md5($lozinka);
		echo $lozinka;
		//zapisuvanje vo baza za noviot korsnik
		$q = mysqli_query($link, "INSERT INTO users(username,password,email,usertype) VALUES('$user','$lozinka','$email','$tip')");
		if ($q) {
			header("Location: login.php");
			print '<span style=float:right;color:blue>Успешна регистрација!&nbsp </span><br>';
		} else
			echo mysql_error();

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

		<?php
	include_once 'navBar.php';
 ?>

		<div class="container">

			<div class="row">

				<div class="col-lg-12">
					<h1 class="page-header"><small>Регистрирајте се на E-tickets!</small></h1>

				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<img class="img-responsive" src="https://www.cisi.org/bookmark/web9/common/library/images/systems/login.jpg" alt="e-tickets"  width="507" height="338">
				</div>

				<div class="col-md-6">
					<h3 style="color:gray">Регистрирајте се!</h3>
					<br />

					<form method="post" action=# role="form">
						<div class="form-group">
							<label for="User1">Корисничко име:</label>
							<input type="user" class="form-control" name="user" id="User1" placeholder="" value=<?php
							if (isset($_POST['user']) && ($flaguser)) {
								echo $user;
							}
							?>>
							<?php
							if (!$flaguser) {
								print '<span style=color:red>Невалидно корисничко име/Корисничкото име веќе постои!&nbsp </span><br>';
							}
							?>
						</div>
						<div class="form-group">
							<label for="Email1">Eмаил:</label>
							<input type="email" class="form-control" name="email" id="Email1" placeholder="" value=<?php
							if (isset($_POST['email']) && ($flagemail))
								echo $email;
							?>>
							<?php
							if (!$flagemail) {
								print '<span style=color:red>Невалидна емаил адреса/Емаил адресата веќе постои!&nbsp </span><br>';
							}
							?>
						</div>
						<div class="form-group">
							<label for="Password1">Лозинка:</label>
							<input type="password" class="form-control" name="pass" id="Password1" placeholder="">
							<?php
							if (!$flagloz) {
								print '<span style=color:red>Лозинката мора да содржи најмалку 8 карактери и барем една цифра!&nbsp </span><br>';
							}
							?>
						</div>
						<div class="form-group">
							<label for="Password1">Потврди лозинка:</label>
							<input type="password" class="form-control" name="pass2" id="Password1" placeholder="">
							<?php
							if (!$flagloz2) {
								print '<span style=color:red>Лозинките не се совпаѓаат!&nbsp </span><br>';
							}
							?>
						</div>

						<div class="form-group">
							<label>Тип на корисник:</label>
							<select name="role" class="form-control">
								<option>Корисник</option>
								<option selected>Организатор</option>
							</select>
						</div>
						<button type="submit" name="submit" class="btn btn-default">
							Регистрација
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