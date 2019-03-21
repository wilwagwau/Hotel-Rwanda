<html>
<head>
	<?php 
		include '../includes/head.php';
		require_once 'includes/config.php'; 
		require_once '../includes/validate.php';
		require_once '../includes/name.php';
	?>
				
	<title>Admin - Users</title>
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
			<div class="card-header">System Users  </div>
			<div class="card-body text-info">

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#newUserModalCenter">
					<i class="fa fa-user-circle-o"></i>  New User
				</button>
				
				<br /> <br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>National ID</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Role</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<!--Php query-->
					<?php
						
						$query = $conn->query("SELECT * FROM `tbl_users` WHERE `role` LIKE 'user' AND `IsDeleted` LIKE b'0' ") or die(mysqli_error());
						while($fetchUser = $query->fetch_array()) {
					?>
						<tr>
							<td><?php echo $fetchUser['national_id'] ?> </td>
							<td><?php echo $fetchUser['name']." ". $fetchUser['surname'] ?></td>
							<td><?php echo $fetchUser['email_id'] ?></td>
							<td><?php echo $fetchUser['role'] ?></td>
							<td><?php echo $fetchUser['status'] ?></td>
							<td>
								<center>
									<!--<a class = "btn btn-sm btn-outline-info" href = "edit_room.php?room_id=<?php echo $fetchUser['user_id']?>"><i class = "fa fa-list"></i>.</a> -->
									<a title="Update <?php echo $fetchUser['name'] ?> ?" class = "btn btn-sm btn-outline-success" href="update_user.php?user_id=<?php echo $fetchUser['user_id'] ?>"><i class = "fa fa-edit"></i> Edit</a>
									<a title="Remove <?php echo $fetchUser['name'] ?> ?" class = "btn btn-sm btn-outline-danger" onclick = "confirmationDelete(<?php echo $fetchUser['user_id']?>); return false;" href = "delete_user.php?user_id=<?php echo $fetchUser['user_id']?>"><i class = "fa fa-trash"></i> Trash</a>
									<!--<a class = "btn btn-sm btn-outline-danger" onClick = "confirmationDelete(<?php echo $fetchUser['user_id']?>);" name="Delete"><i class = "fa fa-trash"></i> Delete</a>-->
								</center>
								<script language="javascript">
								function confirmationDelete(userid)
								{
									if(confirm("Do you want to delete this record ?"))
									{
									window.location.href='delete_user.php?user_id='+userid;
									return true;
									}
								}
								</script>
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
	<?php include '../includes/footer.php' ?>
</div>

<!-- Add New User Modal -->
<?php include 'includes/newUserModal.php' ?>

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