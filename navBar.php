<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<?php if (isset($_SESSION['username'])) {
						$flag = 1;
			} else {
				$flag = 0;
			}
			?>
<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
					<a class="navbar-brand" href="homeUser.php">E-tickets - Бидете секаде каде што ќе посакате </a>

				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">

					<ul class="nav navbar-nav navbar-right">
						<?php 
						//proverka za najaven korsnik
						if ($flag) 
						{
							echo '<li><a href="homepage.php">Почетна</a></li>';
						} 
						?>
						<?php if (!$flag){
						echo '<li><a href="login.php">Најава</a></li>
						<li>
						<a href="signup.php">Регистрација</a>
						</li>';
						} 
						?>
						<?php
						if ($flag)
						{
							echo "<li><a href='dashboard.php'><span style=color:#999999 >Најавени сте како</span> <span class='li'> $_SESSION[username]</span></a></li>";
						} 
						?>

						<?php
						if ($flag) 
						{
							echo "<li><a href='logout.php'>Одјави се</a></li>";
						}
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->

		</nav>