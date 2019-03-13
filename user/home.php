<html>
<head>
	<?php 
		include '../includes/head.php'; 
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
	<title>System User</title>
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
				<b><h6 id="pg_title">USER DASHBOARD</h6></b>
				<hr>
			</div>
		</div>
		
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" class = "active"><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;"><a href = "reservations.php">Reservations</a></li>
			<li style="margin-right: 18px;"><a href = "room.php">Rooms</a></li>			
		</ul>	

	</div>
	<div>
		<?php include '../includes/footer.php' ?>
	</div>
</html>