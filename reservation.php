<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Reservation</title>
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
						$query = $conn->query("SELECT * FROM `tbl_rooms` ORDER BY `room_rate` ASC") or die(mysqli_error());
					while($fetch = $query->fetch_array())
					{
				?>
				<div class="card" style="margin: 8px">
					<div class="row" style="margin: 30px">
						<div class="col-md-3">
							<a href="photo/<?php echo $fetch['photo']?>" data-fluidbox>
								<img class="margin-bottom" src = "images/rooms/<?php echo $fetch['room_photo']?>" height = "150" width = "150" style="border-radius:50%; border: 3px solid lightblue"/>
							</a>
						</div>

						<div class="col-md-7"  >
							<h5><b><u><?php echo "Room : ".$fetch['room_type']?></u></b></h5>
							<h6><b><?php echo "Price : Ksh. ".$fetch['room_rate'].".00"?></b></h6>
							<p><?php echo "Room Label : R-0".$fetch['room_label'] ?></p>
							<p>
								<?php if($fetch['room_status']==0)
										echo "<p class = 'text-danger'>Not Available</p>";
										else if($fetch['room_status']==1)
										echo "<p class = 'text-success'>Available</p>";
								?>
							</p>
						</div>

						<div class="col-md-2" >
							<a style="margin-top: 50%"  href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" >
							
								<?php if($fetch['room_status']==0)
									echo "<p></p>";
									else if($fetch['room_status']==1)
									echo "<p class = 'btn btn-sm btn-outline-info'><i class = 'fa fa-cloud-upload'></i> Reserve</p>";
								?>
							</a>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<!--<?php include 'includes/footer.php'; ?>-->
</body>
</html>