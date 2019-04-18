<?php
	include_once '../admin/includes/config.php';
	
	if(ISSET($_POST['updateUser']))
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email_id = $_POST['email_address'];
		$national_id = $_POST['national_id'];
		$password = md5($_POST['password']);
		
		$conn->query("UPDATE `tbl_users` SET `name` = '$name', `surname` = '$surname', `email_id` = '$email_id', `national_id` = '$national_id', `password` = '$password' WHERE `user_id` = '$user_id' ") or die(mysqli_error());
		
		echo "<script type='text/javascript'> alert('You updated your profile successfully'); </script>";
		//<script>swal('Good..!', 'Profile updated successful', 'success');</script>";
			echo "<script type='text/javascript'> document.location = 'myprofile.php'; </script>";
		
		
	}
?>