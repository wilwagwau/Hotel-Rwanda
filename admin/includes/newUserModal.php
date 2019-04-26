
<!--Password Generating Function -->
<?php
	function passFunc($len, $set = "")
	{
		$gen = "";
		for($i = 0; $i < $len; $i++)
			{
				$set = str_shuffle($set);
				$gen.= $set[0]; 
			}
		return $gen;
	} 
	
?>

<!--PHP Script that adds a new user -->
<?php 
		require '../admin/includes/config.php';
		date_default_timezone_set("Africa/Nairobi");
		$datePrint=date("d-m-Y");
		$time = date("h:i:sa");
								
			if (isset($_POST['addUser']))
			{
				$name=$_POST['name'];
				$surname=$_POST['surname'];
				$email_id=$_POST['email_address'];
				$national_id=$_POST['national_id'];
				$user_type = $_POST['role'];
				$password = md5($_POST['password']);
				date_default_timezone_set("Africa/Nairobi");
				$datePrint=date("d-m-Y");
				$time = date("h:i:sa");

				$query = $conn->query("SELECT * FROM tbl_users WHERE national_id='$national_id'") or die (mysql_error());
				$count = $query->fetch_array();

					if ($count  > 0)
					{ 
?>
		<!--<script>alert("ID Number Already Exist");</script>-->
		<script>swal('Sorry..!', 'The National ID <?php echo $count['national_id']?> already exist', 'warning');</script>";
	<?php
					}
					else
					{
						$user = $conn->query("insert into tbl_users(name, surname, email_id,national_id,role,password,date_created) VALUES('$name', '$surname','$email_id','$national_id','$user_type','$password','$datePrint')");
						//$result = $user->fecth_array();
	?>
						<script>alert('You added a new user successfully.');</script>
	<?php
					}
			} 
	?>
	
<!--New User Modal -->
<div class="modal fade" id="newUserModalCenter" tabindex="-1" role="dialog" aria-labelledby="newUserModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title text-info" id="newUserModalCenterTitle">ADD NEW USER</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
            <form role="form" method = "post" enctype = "multipart/form-data">
                <fieldset>
													
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label>Name</label>
									<input type="text" class="form-control" name="name" placeholder="Enter name" required>
							</div>
							<div class="col">
								<label>Surname</label>
									<input type="text" class="form-control" name="surname" placeholder="Enter surname" required>
							</div>
						</div>
					</div>
								
					<div class="form-group">
						<label>Email Address</label>
							<input class="form-control" placeholder="Enter email address" name="email_address" type="email" required>
					</div>
								
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label>National ID</label>
									<input type="number" class="form-control" name="national_id" placeholder="Enter Id Number" required>
							</div>
							<div class="col">
								<label>User Type</label>
									<select class = "form-control" name = "role" required>
										<option></option>
										<option>admin</option>
										<option>user</option>
									</select>
							</div>
						</div>
					</div>
					
					<div class="form-group">
					<?php $change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'); ?>
					  <label>Password</label>
					  <div class="input-group">
						<input class="form-control"  type = "text" placeholder="Auto-generate" name = "password" id = "pass" required="true" readonly="readonly" />
						<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
					  </div>
					</div>
								
					<button class="btn btn-lg btn-outline-primary btn-block " name = "addUser">Create <i class="fa fa-check"></i></button>
								
                </fieldset>	
            </form>
		</div>
	 
    </div>
  </div>
</div>