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
					<a class="navbar-brand" href="homepage.html">E-tickets - Бидете секаде каде што ќе посакате </a>

				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">

					<ul class="nav navbar-nav navbar-right">
						<?php if ($flag) 
						{
							echo '<li><a href="homepage.php">Почетна</a></li>';
							echo '<li><a href="dashboard.php">Dashboard</a></li>';
						} 
						?>
						<?php if (!$flag){
						echo '<li><a href="login.php">Најава</a></li>
						<li>
						<a href="signup.php">Регистрација</a>
						</li>';
						} 
						?>
						<?php if ($flag){
						echo 
						'<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Повеќе <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="http://finki.ukim.mk/mk/home">ФИНКИ</a>
								</li>
								<li>
									<a href="http://finki.ukim.mk/mk/home">Спонзор 1 </a>
								</li>
								<li>
									<a href="http://finki.ukim.mk/mk/home">Спонзор 2</a>
								</li>
								<li>
									<a href="faq.html">FAQ</a>
								</li>
							</ul>
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