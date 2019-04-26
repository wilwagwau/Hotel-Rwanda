<?php
	include_once '../admin/includes/config.php';
	$query = $conn->query("SELECT * FROM `tbl_users` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch1 = $query->fetch_array();
	$name = $fetch1['name'];
	$surname = $fetch1['surname'];
	$role = $fetch1['role'];
	$user_id = $fetch1['user_id'];
?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container" style="margin-left: -12px;	">
			<a class="navbar-brand" href="home.php" style="color: #4cff00; font-size: 22px;">Hotel<span style="color: #fb7416"> Rwanda</span></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="margin-right: -185px">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $name." ".$surname; ?> <i class="fa fa-angle-double-right"></i> [ <?php echo $role; ?> ]
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item"  href = "myprofile.php?user_id=<?php echo $user_id; ?>"> <i class="fa fa-vcard-o"></i> My Profile</a>
							<a class="dropdown-item" href="../logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>