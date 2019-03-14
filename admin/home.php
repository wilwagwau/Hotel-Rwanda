<html>
<head>
	<?php 
		include '../includes/head.php'; 
		require_once 'includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';		
	?>
	
	<title>Admin</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
	<div>
		<?php include '../includes/header.php' ?>
	</div>
	<div class="container">
		
		<div class="panel panel-info">
			<div class="panel-body">
				<br />
				<b><h6 id="pg_title">ADMIN DASHBOARD</h6></b>
				<hr>
			</div>
		</div>

	
	
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" class = "active"><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;"><a href = "users.php">Users</a></li>
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>	
		<br />
		<div class="card border-info">
			<div class="card-header">Dashbord</div>
			<div class="card-body text-secondary">
				<div class="row">
				
					<!--Number of active users-->
					<?php 
						$q_au = $conn->query("SELECT COUNT(*) as total FROM `tbl_users` WHERE  `role` LIKE 'user' &&`status` LIKE 'active' ") or die(mysqli_error());
						$f_au = $q_au->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<i style="font-size: 30px; " class="fa fa-user-circle-o text-info"></i>
									<div class="stat-panel-title"><b>Active Users</b></div>
								<p class="card-text text-center" style="font-size: 40px;"><?php echo $f_au['total']; ?></p>
								<a href="users.php" class="card-link">See details</a>
							</div>
						</div>
					</div>

					<!-- Number of inactive users-->
					<?php			
						$q_iu = $conn->query("SELECT COUNT(*) as total FROM `tbl_users` WHERE `role` LIKE 'user' && `status` LIKE 'inactive' ") or die(mysqli_error());
						$f_in = $q_iu->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
							<i style="font-size: 30px; " class="fa fa-user-circle text-info"></i>
									<div class="stat-panel-title"><b>Inactive Users</b></div>
								<p class="card-text text-center" style="font-size: 40px;"><?php echo $f_in['total']; ?></p>
								<a href="users.php" class="card-link">See details</a>
							</div>
						</div>
					</div>

					<!-- Total rooms-->
					<?php			
						$q_r = $conn->query("SELECT COUNT(*) as total FROM `tbl_rooms` ") or die(mysqli_error());
						$f_r = $q_r->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
							<i style="font-size: 30px; " class="fa fa-fire text-info"></i>
									<div class="stat-panel-title" ><b>Total Rooms</b></div>
								<p class="card-text text-center" style="font-size: 40px;"><?php echo $f_r['total']; ?></p>
								<a href="rooms.php" class="card-link">See details</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>	
	</div>

	<div>
		<?php include '../includes/footer.php' ?>
	</div>
</body>

</html>