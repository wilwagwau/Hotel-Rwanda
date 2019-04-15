<!DOCTYPE html>
	<?php 
		include '../includes/head.php';
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
<html lang = "en">
	<head>
		<title>Users - Reservations</title>
		<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
	</head>
<body>
	<div>
		<?php include '../includes/header.php' ?>
	</div>
	<div class = "container"><br />
		<div class="panel panel-info">
			<div class="panel-body">
				<b><h6 id="pg_title">USER DASHBOARD</h6></b>
				<hr>
			</div>
		</div>

		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" ><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;" class = "active"><a href = "reservations.php">Reservations</a></li>
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>
		<br>
		<div class="card border-default">
			<div class="card-header">Confirm Reservation  </div>
			<div class="card-body text-info">
			
			<?php
				$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` NATURAL JOIN `tbl_rooms` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
				$fetch = $query->fetch_array();
			?>
			<br />
				<form method = "POST" enctype = "multipart/form-data" action = "save_form.php?transaction_id=<?php echo $fetch['transaction_id']?>">
				Bio Data<hr>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Name</label>
							<input type = "text" value = "<?php echo $fetch['name']?>" class = "form-control" size = "40" disabled = "disabled"/>
						</div>
						<div class="form-group col-md-3">
							<label>Surname</label>
							<input type = "text" value = "<?php echo $fetch['surname']?>" class = "form-control" size = "40" disabled = "disabled"/>
						</div>
						<div class="form-group col-md-5">
							<label>Email Address</label>
							<input type = "text" value = "<?php echo $fetch['email_id']?>" class = "form-control" size = "40" disabled = "disabled"/>
						</div>
					</div>
				Other Details<hr>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Room Type</label>
							<input type = "text" value = "<?php echo $fetch['room_type']?>" class = "form-control" size = "20" disabled = "disabled"/>
						</div>
						<div class="form-group col-md-2">
							<label>Room Label</label>
							<input type = "text" value = "<?php echo 'R - 0'.$fetch['room_label']?>" class = "form-control" size = "20" disabled = "disabled"/>
						</div>
						<div class="form-group col-md-2">
							<label>Days</label>
							<input type = "number" min = "0" max = "99" name = "days" class = "form-control" required = "required"/>
						</div>
						<div class="form-group col-md-2">
							<label>Extra Bed(s)</label>
							<input type = "number" min = "0" max = "99" name = "extra_bed" class = "form-control"/>
						</div>
						<div class="form-group col-md-2">
							<label style = "color:#ff0000;">*Extra Bed cost Ksh. 200</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
						<button name = "add_form" class = "btn btn-sm btn-outline-primary"><i class = "fa fa-cloud-upload"></i> Reserve</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br />
	
	
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>