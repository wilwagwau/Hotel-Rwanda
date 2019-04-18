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
	<div class="containe" style="margin-left: 25px; margin-right:25px;">
		
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
				<div class="pull-right" style="margin-right: 5px;">
				Manage Users  <i class="fa fa-angle-double-right" style="color: orange"></i>
					<a title='Enable all users' class='btn btn-sm btn-default' onclick = "confirmationEnable(); return false;" href = "#"><i class='fa fa-check text-success'></i></a>
					<a title='Disable all users' class='btn btn-sm btn-default' onclick = "confirmationDiable(); return false;" href = "#"><i class='fa fa-user-times text-danger'></i></a>
					<a title='Print all users'  href = "print_users.php" target="_blank"><i class='fa fa-print'></i></a>
				</div> 
				
				<br /> <br />
				<table id = "table" class = "table table-bordered table-responsive-sm table-hover">
					<thead>
						<tr>
							<th>National ID</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Role</th>
							<th colspan="2">Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<!--Php query-->
					<?php
						
						$query = $conn->query("SELECT * FROM `tbl_users` WHERE `role` LIKE 'user' AND `IsDeleted` LIKE b'0' ") or die(mysqli_error());
						while($fetchUser = $query->fetch_array()) 
						{
					?>
						<tr>
							<td><?php echo $fetchUser['national_id'] ?> </td>
							<td><?php echo $fetchUser['name']." ". $fetchUser['surname'] ?></td>
							<td><?php echo $fetchUser['email_id'] ?></td>
							<td><?php echo $fetchUser['role'] ?></td>
							<td><?php if($fetchUser['status']=='active')
											echo "<p class='text-success'>Active</p>";
									   else if($fetchUser['status']=='inactive')
											echo "<p class='text-danger'>Inactive</p>";
								?>
							</td>
							<td><?php if($fetchUser['status']=='active') 
											echo "<a title='Disable user' class='btn btn-sm btn-default' onclick = 'confirmationDiableUser($fetchUser[user_id]); return false;' href = '#'><i class='fa fa-user-times text-danger'></i></a>";
									   else if($fetchUser['status']=='inactive')
									   		echo "<a title='Enable user' class='btn btn-sm btn-default' onclick = 'confirmationEnableUser($fetchUser[user_id]); return false;' href = '#'><i class='fa fa-check text-success'></i></a>";
								?></td>
							<td>
								<center>
									<a title="Update <?php echo $fetchUser['name'] ?> ?" class = "btn btn-sm btn-outline-success" href="update_user.php?user_id=<?php echo $fetchUser['user_id'] ?>"><i class = "fa fa-edit"></i> Edit</a>
									<a title="Remove <?php echo $fetchUser['name'] ?> ?" class = "btn btn-sm btn-outline-danger" onclick = "confirmationDelete(<?php echo $fetchUser['user_id']?>); return false;" href = "delete_user.php?user_id=<?php echo $fetchUser['user_id']?>"><i class = "fa fa-user-times"></i> Trash</a>	
								</center>
								<script language="javascript">

								//Delete a user
								function confirmationDelete(userid)
								{
									if(confirm("Do you want to delete record of this user ?"))
									{
									window.location.href='delete_user.php?user_id='+userid;
									return true;
									}
								}
								
								//Enable a user
								function confirmationEnableUser(userid)
								{
									if(confirm("Do you want to enable this user ?"))
									{
									window.location.href='enable_user.php?user_id='+userid;
									return true;
									}
								}

								//Disable a user
								function confirmationDiableUser(userid)
								{
									if(confirm("Do you want to disable this user ?"))
									{
									window.location.href='disable_user.php?user_id='+userid;
									return true;
									}
								}

								// Enable all users
								function confirmationEnable()
								{
									if(confirm("Do you want to enable all users ?"))
									{
									window.location.href='enableUsers.php';
									return true;
									}
								}

								// Disable all users
								function confirmationDiable()
								{
									if(confirm("Do you want to disable all users ?"))
									{
									window.location.href='disableUsers.php';
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

<!-- Add New User Modal -->
<?php include 'includes/diasbleUserModal.php' ?>
<!-- Add New User Modal -->
<?php include 'includes/enableUserModal.php' ?>

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