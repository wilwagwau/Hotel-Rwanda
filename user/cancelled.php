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
	
		<ul class = "nav nav-pills">
			<li style="margin-right: 18px;" ><a href = "home.php">Dashbord</a></li>
			<li style="margin-right: 18px;" class = "active"><a href = "reservations.php">Reservations</a></li>
			<li style="margin-right: 18px;"><a href = "rooms.php">Rooms</a></li>			
		</ul>	

		<br />
		<?php
			// Cancelled
				$q_c = $conn->query("SELECT COUNT(*) as total FROM `tbl_transaction` WHERE `status` = 'Cancelled'") or die(mysqli_error());
				$f_c = $q_c->fetch_array();
			?>
        <div class="card border-info">
			<div class="card-header text-danger">Cancelled Reservations  <span class = "badge" style="font-size: 15px;"><?php echo $f_c['total']?></span> </div>
            
			
            
			<div class="card-body text-info">
		               
				
                <div class="" >
					<!--Pending Reservations-->
					<div class=""><br>
                        <table id = "table" class = "table table-bordered table-responsive-sm table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email Address</th>
									<th>Room</th>
									<th>Reserved Date</th>
									<th>Cancelled on</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` NATURAL JOIN `tbl_rooms` WHERE `status` = 'Cancelled'") or die(mysqli_error());
									while($fetch = $query->fetch_array())
									{
								?>
								<tr>
									<td><?php echo $fetch['name']." ".$fetch['surname']?></td>
									<td><?php echo $fetch['email_id']?></td>
									<td><?php echo $fetch['room_type'].", R-0".$fetch['room_label']?></td>
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
										</strong>
									</td>
									<td> <?php echo $fetch['cancelled_on'] ?></td>
									<td><?php echo $fetch['status']?></td>
									
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