<?php
 include_once 'delete_reservations.php';
include_once 'database.php';

session_start();

if (isset($_SESSION['username'])) {

	$user = $_SESSION['username'];
	$_SESSION["type"] = "organizator";
	$flag = 1;
	echo $_SESSION['username'];
	echo $_SESSION['user_id'];
} else {

	$user = "Најавете се!";
	$flag = 0;
	header("Location: login.php");
}
$event = "";
$num = "";
$type = "";
$price = "";
$auto = "";

if (isset($_POST['submit'])) {

	function rand_string($len, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
		$string = '';
		for ($i = 0; $i < $len; $i++) {
			$pos = rand(0, strlen($chars) - 1);
			$string .= $chars{$pos};
		}
		return $string;
	}

	//$r=rand_string(15);
	//echo $r;

	$num = $_POST['num'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$msg = "";

	$event = $_POST['event'];
	$auto = $_POST['code'];

	if ($event != null && $num != null && $type != null && $price != null && $auto != null) {

		$query = "SELECT * FROM event_details WHERE event_id LIKE '$event'";
		$result = mysqli_query($link, $query);
		if ($result) {

			$row1 = mysqli_fetch_assoc($result);
			$event_id = $row1['event_detailsId'];
			for ($i = 0; $i < $num; $i++) {
				$code = rand_string(15);

				$query1 = "INSERT INTO tickets (code, type, ticket_price, details_id)
	 				VALUES('" . $code . "','" . $type . "','" . $price . "','" . $event_id . "')";
				if (mysqli_query($link, $query1)) {
					$msg = "Успешно додадени билети! uspeh";
					//header('Location: homeOrganizator.php');

				} else {
					$msg = "Билетите не беа додадени, обидете се повторно! povtorno ";
				}

			}

		} else {
			$msg = "Неточно ID на настан";
		}
	} else {
		$msg = "Пополнете ги сите полиња";
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

<div class="col-md-8">

<?php
if (isset($_POST['submit'])) {
	echo "<h5 style=color:red>" . $msg . "</h5>";
}
?>
<h3 style="color:gray">Внесување на билети за настан</h3>
<br />

<form action="" method="post"  enctype="multipart/form-data" >
<div class="form-group">
<label for="event"> Избери настан </label>
<?php
$id = $_SESSION['user_id'];
$query = "SELECT * FROM events where org_id='$id' ";
//select na vekepostoecki kategorii
print "<select name='event' id='event'>";
$result = mysqli_query($link, $query);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		print "<option value='" . $row['eventId'] . "' ";

		print ">" . $row['event_name'] . "</option>";
	}
}
print "</select><br/>";
?>

<label for="des">Број на билети:</label>
<input type="text" class="form-control" name="num" id="num" value="<?php echo $num; ?>">

<label for="date"> Тип на билет: </label>
<br/>
<input type="text" class="form-control" name="type" id="type" value="<?php echo $type; ?>">
<label for="time"> Цена на билет: </label>
<br/>
<input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">

<input type='checkbox' name='code' value='yes' name='code' id='code'  >
Автоматско генерирање код</input>
<br/>

<input  class="btn btn-default" type="submit"  value="Додади билети" name="submit" id="submit"  />

</form>
</div>

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
