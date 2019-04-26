<html>
<head>
	<?php 
		include '../includes/head.php'; 
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';		
	?>
	
	<title>User</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
	<div>
		<?php include '../includes/header.php' ?>
	</div>
	<div class="containe" style="margin-left: 25px; margin-right:25px;">
		
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
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>	
		<br />
		<div class="card border-info">
			<div class="card-header">Dashbord</div>
			<div class="card-body text-secondary">

				<div class="row">
				
				<!--Pending-->
				<?php
					$q_p = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
					$f_p = $q_p->fetch_array();
				?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
								<i style="font-size: 35px; " class="fa fa-inbox text-info"></i>
									<div class="stat-panel-title"><b>Pending Reservations</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo $f_p['total']; ?></p>
								<a href="reservations.php" class="card-link">See Details</a>
							</div>
						</div>
					</div>

					<!--Checked In-->
					<?php 
						$q_ci = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
						$f_ci = $q_ci->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
							<i style="font-size: 35px; " class="fa fa-list text-info"></i>
									<div class="stat-panel-title"><b>Checked In</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo $f_ci['total']; ?></p>
								<a href="checked_in.php" class="card-link">See Details</a>
							</div>
						</div>
					</div>

					<!-- Checked Out-->
					<?php			
							$q_co = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Check out'") or die(mysqli_error());
							$f_co = $q_co->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
							<i style="font-size: 35px; " class="fa fa-folder-open-o text-info"></i>
									<div class="stat-panel-title" ><b>Checked Out</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo $f_co['total']; ?></p>
								<a href="checked_out.php" class="card-link">See Details</a>
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">

					<!-- Rooms-->
					<?php			
							$q_co = $conn->query("SELECT COUNT(*) as total FROM `tbl_rooms` WHERE `room_status` = 1 ") or die(mysqli_error());
							$f_co = $q_co->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
							<i style="font-size: 35px; " class="fa fa-ravelry text-success"></i>
									<div class="stat-panel-title" ><b>Available Rooms</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo $f_co['total']; ?></p>
								<a href="rooms.php" class="card-link">See Details</a>
							</div>
						</div>
					</div>

					<!-- Cancelled-->
					<?php			
							$q_cr = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Cancelled' ") or die(mysqli_error());
							$f_cr = $q_cr->fetch_array();
					?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
							<i style="font-size: 35px; " class="fa fa-times text-danger"></i>
									<div class="stat-panel-title" ><b>Cancelled Reservations</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo $f_cr['total']; ?></p>
								<a href="cancelled.php" class="card-link">See Details</a>
							</div>
						</div>
					</div>

					
					<!-- Sales-->
					<?php
						$stmt = $conn->query("SELECT * FROM `tbl_transaction` WHERE `status` = 'Check out' ") or die(mysqli_error($conn));
						$stmt1 = $stmt->fetch_array();
					
						$total = 0;
						foreach($stmt as $details)
						{
						  $subtotal = $details['bill'];
						  $total += $subtotal;
						}
					?>
					<div class="col-md-4">
						<div class="card" style="width: 20rem;">
							<div class="card-body">
							<i style="font-size: 35px; " class="fa fa-money text-success"></i>
									<div class="stat-panel-title" ><b>Total Amount</b></div>
								<p class="card-text text-center" style="font-size: 25px;"><?php echo "Ksh. ".$total; ?></p>
								<a href="print_report.php" target="_blank" class="card-link">See Details</a>
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