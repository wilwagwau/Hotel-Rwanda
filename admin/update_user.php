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
			<div class="card-header">Update User  </div>
			<?php
				$query = $conn->query("SELECT * FROM `tbl_users` WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysqli_error());
				$fetch = $query->fetch_array();
			?>
			<div class="card-body text-info">
				<div class="row">
					
					<div class="col-md-6">
						<img src="../images/profile.png" style="margin-left: 180px; margin-top: 45px"/>
						<!--<center><input type = "file" required = "required" id = "photo" name = "photo" /></center>-->
					</div>
					<div class="col-md-6">
						<form role="form" method = "post" enctype = "multipart/form-data">
							<fieldset>
																
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Name</label>
												<input type="text" class="form-control" value="<?php echo $fetch['name']?>" name="name" placeholder="Enter name" required>
										</div>
										<div class="col">
											<label>Surname</label>
												<input type="text" class="form-control" value="<?php echo $fetch['surname']?>" name="surname" placeholder="Enter surname" required>
										</div>
									</div>
								</div>
											
								<div class="form-group">
									<label>Email Address</label>
										<input class="form-control" placeholder="Enter email address" value="<?php echo $fetch['email_id']?>" name="email_address" type="email" required>
								</div>
								
								<div class="form-group">
									<label>National ID</label>
												<input type="number" class="form-control" value="<?php echo $fetch['national_id']?>" name="national_id" placeholder="Enter Id Number" required>
								</div>
											
								<button class="btn btn-lg btn-outline-primary btn-block " name = "updateUser">Update <i class="fa fa-spin fa-refresh"></i></button>
											
							</fieldset>	
						</form>
						<?php require_once 'includes/update_user_query.php' ?>
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