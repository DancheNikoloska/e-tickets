<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<?php  //proveruvame dali ima nekoj najaven
	if (isset($_SESSION['username'])) {
		$flag = 1;
		} else {
			$flag = 0;}	?>
			
<div class="container">
				<div class="navbar-header">					
					<a class="navbar-brand" href="homeUser.php">E-tickets - Бидете секаде каде што ќе посакате </a>

				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">

					<ul class="nav navbar-nav navbar-right">					
						<?php //proverka za najaven korsnik 
						if ($flag)
						{
							echo "<li><a href='userProfile.php'><span style=color:#999999 >Најавени сте како</span> <span style=color:#31DEF5;> $_SESSION[username]</span></a></li>";
							echo "<li><a href='logout.php'>Одјави се</a></li>";
						} 
						else {
							echo '<li><a href="login.php">Најава</a></li>
								  <li><a href="signup.php">Регистрација</a></li>';
						}
						?>

						
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->

		</nav>