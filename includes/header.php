

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="home.php" style="color: #4cff00; font-size: 22px;">Hotel<span style="color: #fb7416"> Rwanda</span></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $name." ".$surname; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="myaccount.php"> <i class="fa fa-user-circle-o"></i> Account</a>
							<a class="dropdown-item" href="../logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>