<?php
	include_once 'config.php';
	
	if(ISSET($_POST['updateRoom']))
	{
		$room_type = $_POST['room_type'];
		$room_label = $_POST['room_label'];
		$room_rate = $_POST['room_rate'];
		
		$room_photo = $_FILES['room_photo']['name'];
		move_uploaded_file($_FILES['room_photo']['tmp_name'], '../images/rooms/'.$room_photo);
		$filename = $room_photo;
		//Updating details
		$conn->query("UPDATE `tbl_rooms` SET `room_type` = '$room_type', `room_label` = '$room_label', `room_rate` = '$room_rate', `room_photo` = '$filename' WHERE `room_id` = '$_REQUEST[room_id]' ") or die(mysqli_error());
		echo "<script type='text/javascript'> document.location = 'rooms.php'; </script>";
	}
?>