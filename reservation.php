<html>
<head>
	<?php include 'includes/head.php';?>
	<title>Reservation</title>
</head>
<body>
	<div>
		<?php include 'includes/navigation.php' ?>
	</div>
	<br>
	<div class="container">
		<div class="card card-default">
			<div class="card-body">
			
				<strong><h6 class="text-info">MAKE RESERVATION</h6></strong>
				<hr>
				<?php include 'admin/includes/config.php' ?>
				<?php
				// Junior Suite
					$q_js = $conn->query("SELECT COUNT(*) as total FROM `tbl_rooms` WHERE `room_type` = 'Junior Suite' && `room_status` = 1 ") or die(mysqli_error());
					$f_js = $q_js->fetch_array();

				// Mini Suite
					$q_mis = $conn->query("SELECT COUNT(*) as total FROM `tbl_rooms` WHERE `room_type` = 'Mini Suite' && `room_status` = 1 ") or die(mysqli_error());
					$f_mis = $q_mis->fetch_array();

				// Master Suite
					$q_mas = $conn->query("SELECT COUNT(*) as total FROM `tbl_rooms` WHERE `room_type` = 'Master Suite' && `room_status` = 1 ") or die(mysqli_error());
					$f_mas = $q_mas->fetch_array();
				?>
				<div class="card-body text-detault">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
	                    <li class="nav-item">
	                        <a class="nav-link active" id="junior-tab" data-toggle="tab" href="#junior" role="tab" aria-controls="junior" aria-selected="true">
	                            <span class = "badge text-success" style="font-size: 15px;"><?php echo $f_js['total']?></span> <i class="fa fa-angle-double-right"></i> Junior Suite
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="mini-tab" data-toggle="tab" href="#mini" role="tab" aria-controls="mini" aria-selected="false">
	                            <span class = "badge text-success" style="font-size: 15px;"><?php echo $f_mis['total']?></span> <i class="fa fa-angle-double-right"></i> Mini Suite
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="master-tab" data-toggle="tab" href="#master" role="tab" aria-controls="master" aria-selected="false">
	                            <span class = "badge text-success" style="font-size: 15px;"><?php echo $f_mas['total']?></span> <i class="fa fa-angle-double-right"></i> Master Suite
	                        </a>
	                    </li>
	                </ul>

	                
	                <div class="tab-content" id="myTabContent">

	                <!-- Tab for Junior Suite Rooms -->
		                <div class="tab-pane fade show active" id="junior" role="tabpanel" aria-labelledby="junior-tab"><br>
		                		<?php
									require_once 'admin/includes/config.php';
										$query = $conn->query("SELECT * FROM `tbl_rooms` WHERE `room_type` LIKE 'Junior Suite' ORDER BY `room_label` ASC") or die(mysqli_error());
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
											<h4><b><u><?php echo "Room : ".$fetch['room_type']?></u></b></h4>
											<h5><b><?php echo "Price : Ksh. ".$fetch['room_rate'].".00"?></b></h5>
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
												<?php if($fetch['room_status']==1)
														echo "<p class = 'btn btn-sm btn-outline-info'><i class = 'fa fa-inbox'></i> Reserve</p>";
													else if($fetch['room_status']==0)
														echo "<p></p>";
												?>
											</a>
										</div>
									</div>
								</div>
								<?php
									}
								?>
		                </div>


		                <!-- Tab for Mini Suite Rooms -->
		                <div class="tab-pane fade show" id="mini" role="tabpanel" aria-labelledby="mini-tab"><br>
		                		<?php
									require_once 'admin/includes/config.php';
										$query = $conn->query("SELECT * FROM `tbl_rooms` WHERE `room_type` LIKE 'Mini Suite' ORDER BY `room_label` ASC") or die(mysqli_error());
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
											<h4><b><u><?php echo "Room : ".$fetch['room_type']?></u></b></h4>
											<h5><b><?php echo "Price : Ksh. ".$fetch['room_rate'].".00"?></b></h5>
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
												<?php if($fetch['room_status']==1)
														echo "<p class = 'btn btn-sm btn-outline-info'><i class = 'fa fa-inbox'></i> Reserve</p>";
													else if($fetch['room_status']==0)
														echo "<p></p>";
												?>
											</a>
										</div>
									</div>
								</div>
								<?php
									}
								?>
		                </div>


		                 <!-- Tab for Master Suite Rooms -->
		                 <div class="tab-pane fade show" id="master" role="tabpanel" aria-labelledby="master-tab"><br>
		                		<?php
									require_once 'admin/includes/config.php';
										$query = $conn->query("SELECT * FROM `tbl_rooms` WHERE `room_type` LIKE 'Master Suite' ORDER BY `room_label` ASC") or die(mysqli_error());
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
											<h4><b><u><?php echo "Room : ".$fetch['room_type']?></u></b></h4>
											<h5><b><?php echo "Price : Ksh. ".$fetch['room_rate'].".00"?></b></h5>
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
												<?php if($fetch['room_status']==1)
														echo "<p class = 'btn btn-sm btn-outline-info'><i class = 'fa fa-inbox'></i> Reserve</p>";
													else if($fetch['room_status']==0)
														echo "<p></p>";
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
			</div>
		</div>
	</div>
	<!--<?php include 'includes/footer.php'; ?>-->
</body>
</html>