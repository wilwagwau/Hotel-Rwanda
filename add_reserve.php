<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Add Reserve</title>
</head>
<body>
	<div>
		<?php include 'includes/navigation.php' ?>
	</div>
	<br>
	<div class="container">
		<div class="card card-info">
			<div class="card-body">
				<strong><h6 class="text-info">MAKE RESERVATION</h6></strong>
				<hr>
				<?php 
					require_once 'admin/includes/config.php';
					$query = $conn->query("SELECT * FROM `tbl_rooms` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div style = "height:278px; width:100%;">
								<div style = "float:left;">
									<img src = "images/rooms/<?php echo $fetch['room_photo']?>" height = "278px" width = "300px" style="border: 3px solid lightblue">
									<br/><br/><h5 class="text-info"><?php echo "Room : ".$fetch['room_type']?></h5>
									<h6><?php echo "Room Label : R-0".$fetch['room_label'];?>  <i class="fa fa-angle-double-right" style="color: orange"></i>  <?php echo "Ksh. ".$fetch['room_rate'].".00";?></h6>
								</div>
							</div>
						</div>

						<div class="col-md-7">
						
							<p class="text-center"><b><i>ENTER YOUR DETAILS</i></b></p><hr>
							<form method = "POST" enctype = "multipart/form-data">
							
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-10">
										<input type = "text" class = "form-control" name = "name" required = "required" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Surname</label>
									<div class="col-sm-10">
										<input type = "text" class = "form-control" name = "surname" required = "required" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type = "email" class = "form-control" name = "emailid" required = "required" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Check in</label>
									<div class="col-sm-10">
										<input type = "date" class = "form-control" name = "c_date" required = "required" />
									</div>
								</div>

								<br />
								<div class = "form-group">
									<div class="row">
										<div class="col">
											<button class = "btn btn-sm btn-outline-info btn-block form-control" name = "add_guest"><i class="fa fa-check-circle"></i> Submit </button>
										</div>
										<div class="col">
											<a href="reservation.php" class="btn btn-sm btn-outline-danger btn-block form-control"><i class="fa fa-times-circle"></i> Cancel </a>
										</div>
									</div>	
								</div>
					
								<hr>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once 'add_query_reserve.php' ?>
	<?php include 'includes/footer.php'; ?>
</body>
</html>