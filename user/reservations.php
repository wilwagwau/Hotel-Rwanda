<html>
<head>
	<?php 
		include '../includes/head.php';
		require_once '../admin/includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>	
	<title>Users - Reservations</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
	<style>
	label{
		margin-left: 5px; 
		margin-right: 5px;
	}
		input {
			border: none; 
			border-bottom: 1px solid grey;
		}
	</style>
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

		<!-- Auto cancel Reservation -->
		<?php 
			$now = date("Y-m-d", strtotime("+8 HOURS"));
			$cancel = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_rooms` WHERE `status` = 'Pending' AND `Checkin` < '$now'") or die(mysqli_error());
			$fetchPending = $cancel->fetch_array();
			$transaction_id = $fetchPending['transaction_id'];

			$noRow = $cancel->num_rows;
			if($noRow > 0)
			{
				$queryCancel = $conn->query("UPDATE `tbl_transaction` SET `status` = 'Cancelled' WHERE  `transaction_id` LIKE '$transaction_id' ") or die(mysqli_error($conn));
    			if($queryCancel==1)
			    {
			       	$conn->query("UPDATE `tbl_rooms` SET `room_status` = 1 WHERE `room_id` = '$row[room_id]' ") or die(mysqli_error());
			        echo "<script type='text/javascript'> document.location = 'reservations.php'; </script>";
			    }

			}

		?>
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" ><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;" class = "active"><a href = "reservations.php">Reservations</a></li>
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>	

		<br />
		
        <div class="card border-info">
			<div class="card-header">Pending Reservations</div>
            
			<?php
			// Pending
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();

			// Checked In
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();

			// Checked Out
				$q_co = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Check out'") or die(mysqli_error());
				$f_co = $q_co->fetch_array();
			?>
            
			<div class="card-body text-info">
				<ul class = "nav nav-pills">
					<li style="margin-right: 12px;" >
						<a class="btn btn-sm btn-success disabled" href = "#"> <span class = "badge" style="font-size: 15px;"><?php echo $f_p['total']?></span> Pendings</a>
					</li>
					<li style="margin-right: 12px;" >
						<a class="btn btn-sm btn-info" href = "checked_in.php"> <span class = "badge" style="font-size: 15px;"><?php echo $f_ci['total']?></span> Checked In</a>
					</li>
					<li style="margin-right: 12px;" >
						<a class="btn btn-sm btn-info" href = "checked_out.php"> <span class = "badge" style="font-size: 15px;"><?php echo $f_co['total']?></span> Checked Out</a>
					</li>		
				</ul>
               
				
                <div class="" >
					<!--Pending Reservations-->
					<div class=""><br>
                        <table id = "table" class = "table table-bordered table-responsive-sm table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email Address</th>
									<th>Room</th>
									<th>Reservation Date</th>
									<th>Reserved Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` NATURAL JOIN `tbl_rooms` WHERE `status` = 'Pending'") or die(mysqli_error());
									while($fetch = $query->fetch_array())
									{
								?>
								<tr>
									<td><?php echo $fetch['name']." ".$fetch['surname']?></td>
									<td><?php echo $fetch['email_id']?></td>
									<td><?php echo $fetch['room_type'].", R-0".$fetch['room_label']?></td>
									<td><?php echo $fetch['reserve_date']?></td>
									<td>
										<strong>
											<?php 
												if($fetch['checkin'] <= date("Y-m-d", strtotime("+8 HOURS")))
												{
													echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>";
												}
												else
												{	
													echo "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>";
												}
											?>
										</strong></td>
									<td><?php echo $fetch['status']?></td>
									<td>
										<center>
											<a class = "btn btn-sm btn-outline-success" href = "confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class = "fa fa-check"></i> Check In</a> 
											<a class = "btn btn-sm btn-outline-danger" onclick = "confirmationCancel(<?php echo $fetch['transaction_id']?>); return false;" href = "cancel_reservation.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class = "fa fa-times"></i> Cancel</a>	
										</center>
										<script type="text/javascript">
											//Cancel a reservation
											function confirmationCancel(transaction_id)
											{
											if(confirm("Do you want to cancel this reservation ?"))
												{
													window.location.href='cancel_reservation.php?transaction_id='+transaction_id;
													return true;
												}
											}
										</script>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
                        </table>
                    </div>
										
                </div>
			</div>
	    </div>
	</div>
<div>
	<!-- <?php include '../includes/footer.php' ?> -->
</div>

</body>

<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script> 

</html>