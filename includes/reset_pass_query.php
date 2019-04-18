<?php
	include_once './admin/includes/config.php';
	
	if(ISSET($_POST['reset_pass']))
	{
		$national_id = $_POST['national_id'];
		$email_id = $_POST['email_address'];
		$new_pass = $_POST['new_pass'];
		$confirm_new_pass = $_POST['confirm_new_pass'];
		
		//Check the credentials
		$query = $conn->query("SELECT * FROM `tbl_users` WHERE `national_id` LIKE '$national_id' && `email_id` LIKE '$email_id' ") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		if($row > 0)
		{
			if($new_pass == $confirm_new_pass)
			{
				$old_pass = $conn->query("SELECT * FROM `tbl_users` WHERE `national_id` LIKE '$national_id' && `email_id` LIKE '$email_id' ") or die(mysqli_error());
				$fetch1 = $old_pass->fetch_array();
				$result = $fetch1['user_id'];
				$conn->query("UPDATE `tbl_users` SET `password` = '$new_pass' WHERE `user_id` = $result ") or die(mysqli_error());
				echo "<center><p class = 'text-success'>You have sucessfully changed your password</p></center>";
				//echo "<script>swal('Success....!', 'You have sucessfully changed your password.', 'success');</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
			else
			{
				echo "<center><p class = 'text-danger'>Passwords not matching</p></center>";
				//echo "<script>swal('Sorry $email_id', 'Passwords not matching.', 'warning');</script>";
			}
		}
		else
		{
			echo "<center><p class = 'text-danger'>No matching records. </p></center>";
			//echo "<script>swal('Sorry $email_id', 'No matching records.', 'error');</script>";
		}
	}
?>