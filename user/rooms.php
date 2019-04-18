<html>
<head>
	<?php 
		include '../includes/head.php';
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
				
	<title>User - Rooms</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
	<div>
		<?php include '../includes/header.php' ?>
	</div>
	<div class="containe" style="margin-bottom: 15px; margin-left: 25px; margin-right:25px;">
		
		<div class="panel panel-info">
			<div class="panel-body">
				<br />
				<b><h6 id="pg_title">USER DASHBOARD</h6></b>
				<hr>
			</div>
		</div>
	
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" ><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;" ><a href = "reservations.php">Reservations</a></li>
			<li style="margin-right: 18px;" class = "active"><a href = "rooms.php">Rooms</a></li>			
		</ul>	

		<br />

		<div class="card border-info">
			<div class="card-header">Room Availability  </div>
			<div class="card-body text-info">

				<table id = "table" class = "table table-bordered table-responsive-sm table-hover">
					<thead>
						<tr>
                            <th>Room Photo</th>
							<th>Room Type</th>
							<th>Room Label</th>
							<th>Room Rate</th>
							<th>Status</th>
							
						</tr>
					</thead>

					<tbody>
					<!--Php query-->
					<?php
						
						$room_query = $conn->query("SELECT * FROM `tbl_rooms` ORDER BY `room_rate` ASC ") or die(mysqli_error());
						while($fetchRoom = $room_query->fetch_array()) {
					?>
						<tr>
                            <td><center><img src = "../images/rooms/<?php echo $fetchRoom['room_photo']?>" height = "50" width = "50"/></center></td>
                            <td><?php echo $fetchRoom['room_type'] ?> </td>
							<td>R-0<?php echo $fetchRoom['room_label'] ?></td>
							<td>Ksh. <?php echo $fetchRoom['room_rate'] ?>.00</td>
							<td>
								<?php 
									if($fetchRoom['room_status']==0)
										echo "<button class = 'btn btn-sm btn-danger disabled'><i class='fa fa-ban'></i> Booked</button>";
									else if($fetchRoom['room_status']==1)
										echo "<button class = 'btn btn-sm btn-success disabled'><i class='fa fa-check-circle'></i> Vaccant</button>";
								?>
							</td>
						</tr>
					<?php
						}
					?>
					<!--// query-->
					</tbody>
				</table>

			</div>
		</div>
	
	</div>
<div>
	<!-- <?php include '../includes/footer.php' ?> -->
</div>

</body>
<!--
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
-->
</html>