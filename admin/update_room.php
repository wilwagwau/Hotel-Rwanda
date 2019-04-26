<html>
<head>
	<?php 
		include '../includes/head.php';
		require_once 'includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
				
	<title>Admin - Update user</title>
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
			<li style="margin-right: 18px;" ><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;" class = "active"><a href = "users.php">Users</a></li>
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>	

		<br />

		<div class="card border-info">
			<div class="card-header">Update Room  </div>
			<?php
				$query = $conn->query("SELECT * FROM `tbl_rooms` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
				$fetch = $query->fetch_array();
			?>
			<div class="card-body text-info">
				<div class="row">
					
					<div class="col-md-6" style="border-right: 1px solid grey">
						<img src="../images/rooms/<?php echo $fetch['room_photo'];?>" style="margin-left:25%; width: 40%"/>
						<!-- <input style="text-align: right" type = "file" required = "required" name = "room_photo" /> -->
					</div>
					<div class="col-md-6">
						<form role="form" method = "post" enctype = "multipart/form-data">
							<fieldset>
																		
								<div class="form-group">
									
									<div class="row">
										<div class="col">
											<label>Room Type</label>
											<select class = "form-control" name = "room_type" value="<?php echo $fetch['room_type']?>" required />
												<option></option>
												<option>Mini Suite</option>
												<option>Junior Suite</option>
												<option>Master Suite</option>
											</select>
										</div>
										
										<div class="col">
											<label>Room Label</label>
												<input type="text" class="form-control" value="<?php echo "R-0".$fetch['room_label']?>" name="room_label" required>
										</div>
										<div class="col">
											<label>Room Price</label>
												<input type="text" class="form-control" value="<?php echo "Ksh. ".$fetch['room_rate']?>" name="room_rate" required>
										</div>
									</div>
								</div>
								<br />
								<div class="row">
									<div class="col">
										<button class="btn btn-sm btn-outline-success btn-block " name = "updateRoom">Update <i class="fa fa-spin fa-refresh"></i></button>
									</div>
									<div class="col">
										<a href="rooms.php" class="btn btn-sm btn-outline-danger btn-block"><i class="fa fa-close"></i> Cancel</a>
									</div>
								</div>			
							</fieldset>	
						</form>
						<?php require_once 'includes/update_room_query.php' ?>
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