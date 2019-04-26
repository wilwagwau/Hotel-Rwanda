<?php
	include_once './admin/includes/config.php';
	
	if(ISSET ($_POST['login']))
	{
		$email_id = $_POST['email_address'];
		$password = md5($_POST['password']);

		$query = $conn->query("SELECT * FROM `tbl_users` WHERE `email_id` = '$email_id' AND `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		
		$user_type = $fetch['role'];
		$status = $fetch['status'];
		$name = $fetch['name'];
		
		if($row > 0 && $user_type == 'admin')
		{
			session_start();
			$_SESSION['user_id'] = $fetch['user_id'];
			echo "<script type='text/javascript'> document.location = 'admin/home.php'; </script>";
		}
		else if($row > 0 && $user_type == 'user')
		{
			if($status == 'active')
			{
				session_start();
				$_SESSION['user_id'] = $fetch['user_id'];
				echo "<script type='text/javascript'> document.location = 'user/home.php'; </script>";
			}
			else
			{
				echo "<script>alert('Sorry $name. Your account has not been activated');</script>";
				//echo "<script>swal('Sorry $name', 'Your account has not been activated.', 'warning');</script>";
			}
		}
		else
		{
			echo "<center><p class = 'text-danger'>These credentials do not match our record.</p></center>";
			//echo "<script>swal('Sorry..!', 'These credentials do not match our record.', 'error');</script>";
		}
	}
?>