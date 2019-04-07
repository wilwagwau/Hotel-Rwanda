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
		
        <div class="card border-info">
			<div class="card-header">Checked Out Reservations  
				
				<div class="pull-right">
					<!-- <form method="POST" class="form-inline" action="sales_print.php">
						<label >From :  </label><input type="date" 	> <br>
						<label >To :  </label><input type="date"> 
						<button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="fa fa-print"></span> Print</button>
					</form> -->

					<a href="print_report.php" target="_blank" class="text-success"><span class="fa fa-print"></span> Print</a>
				</div> 
				
			</div>
            
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
						<a class="btn btn-sm btn-info" href = "reservations.php"> <span class = "badge" style="font-size: 15px;"><?php echo $f_p['total']?></span> Pendings</a>
					</li>
					<li style="margin-right: 12px;" >
						<a class="btn btn-sm btn-info" href = "checked_in.php"> <span class = "badge" style="font-size: 15px;"><?php echo $f_ci['total']?></span> Checked In</a>
					</li>
					<li style="margin-right: 12px;" >
						<a class="btn btn-sm btn-success disabled" href = "#"> <span class = "badge" style="font-size: 15px;"><?php echo $f_co['total']?></span> Checked Out</a>
					</li>		
				</ul>
               
				
                <div class="" >
					
					
					<!--Checked Out Reservations-->
                    <div class=""><br>
						<table id = "table" class = "table table-bordered table-responsive-sm table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Room</th>
									<th>Label</th>
									<th>Checkin</th>
									<th>Days</th>
									<th>Checkout</th>
									<th>Status</th>
									<th>Bed</th>
									<th>Bill</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` NATURAL JOIN `tbl_rooms` WHERE `status` = 'Check Out'") or die(mysqli_query());
									while($fetch = $query->fetch_array())
									{
								?>
								<tr>
									<td><?php echo $fetch['name']." ".$fetch['surname']?></td>
									<td><?php echo $fetch['room_type']?></td>
									<td><?php echo 'R-0'.$fetch['room_label']?></td>
									<td><?php echo "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>"." @ "."<label>".date("h:i a", strtotime($fetch['checkin_time']))."</label>"?></td>
									<td><?php echo $fetch['days']?></td>
									<td><?php echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS"))."</label>"." @ "."<label>".date("h:i a", strtotime($fetch['checkout_time']))."</label>"?></td>
									<td><?php echo $fetch['status']?></td>
									<td><?php if($fetch['extra_bed'] == "0"){ echo "None";}else{echo $fetch['extra_bed'];}?></td>
									<td><?php echo "Ksh. ".$fetch['bill'].".00"?></td>
									<td>
										<center>
											<a class = "btn btn-sm btn-outline-info" target="_blank" href = "print_receipt.php?transaction_id=<?php echo $fetch['transaction_id']?>"> Print</a>
										</center>
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