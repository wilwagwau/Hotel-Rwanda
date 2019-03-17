<?php
	include_once 'config.php';
	
	if(ISSET($_POST['updateUser']))
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email_id = $_POST['email_address'];
		$national_id = $_POST['national_id'];
		
		//Updating details
		$conn->query("UPDATE `tbl_users` SET `name` = '$name', `surname` = '$surname', `email_id` = '$email_id', `national_id` = '$national_id' WHERE `user_id` = '$_REQUEST[user_id]' ") or die(mysqli_error());
		echo "<script type='text/javascript'> document.location = 'users.php'; </script>";
	}
?>