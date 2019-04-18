<html>
<head>
	<?php 
		include '../includes/head.php';
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
				
	<title>My Profile</title>
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
				<b><h6 id="pg_title">ADMIN PROFILE</h6></b>
				<hr>
			</div>
		</div>
	
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" class = "active"><a href = "home.php">Go Back <i class="fa fa-sign-out"></i></a></li>			
		</ul>	

		<br />

		<div class="card border-info">
			<div class="card-header">Update Profile  </div>
			<?php
				$query = $conn->query("SELECT * FROM `tbl_users` WHERE `user_id` = '$user_id'") or die(mysqli_error());
				$fetch = $query->fetch_array();
			?>
			<div class="card-body text-info">
				<div class="row">
					
					<div class="col-md-6" style="border-right: 1px solid grey">
						<img src="../images/profile.png" style="margin-left: 180px; margin-top: 10px" alt="Profile Picture"/>
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
										<div class="col">
											<label>National ID</label>
												<input type="number" class="form-control" value="<?php echo $fetch['national_id']?>" name="national_id" placeholder="Enter Id Number" required>
										</div>
									</div>
								</div>
											
								<div class="form-group">
									<label>Email Address</label>
										<input class="form-control" placeholder="Enter email address" value="<?php echo $fetch['email_id']?>" name="email_address" type="email" required>
								</div>
								<br/>	
								<div class="row">
									<div class="col">
										<button class="btn btn-sm btn-outline-primary btn-block " name = "updateUser">Update <i class="fa fa-spin fa-refresh"></i></button>
									</div>
									<div class="col">
										<a href="home.php" class="btn btn-sm btn-outline-danger btn-block ">Cancel <i class="fa fa-trash"></i></a>
									</div>
								</div>					
							</fieldset>	
						</form>
						<?php require_once '../update_myprofile.php' ?>
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