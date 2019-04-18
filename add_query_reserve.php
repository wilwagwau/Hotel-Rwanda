<?php
	require_once 'admin/includes/config.php';
	if(ISSET($_POST['add_guest']))
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$emailid = $_POST['emailid'];
		$checkin = $_POST['c_date'];

		$conn->query("INSERT INTO `tbl_guest` (name, surname, email_id)  VALUES('$name', '$surname', '$emailid')") or die(mysqli_error($conn));

		$query = $conn->query("SELECT * FROM `tbl_guest` WHERE `name` = '$name' && `email_id` = '$emailid' ") or die(mysqli_error());

		$fetch = $query->fetch_array();

		if($checkin < date("Y-m-d", strtotime('+8 HOURS')))
		{	
			echo "<script>alert('MUST BE PRESENT DATE.')</script>";
			//echo "<script>swal('Sorry', 'Must be present date.', 'error');</script>";
		}
		else
		{
			if($guest_id = $fetch['guest_id'])
			{	
				$room_id = $_REQUEST['room_id'];
				$reserveQuery = $conn->query("INSERT INTO `tbl_transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')") or die(mysqli_error($conn));
				if($reserveQuery==1)
				{
					$conn->query("UPDATE `tbl_rooms` SET `room_status` = 0 WHERE `room_id` = '$room_id' ") or die(mysqli_error());
					echo "<script type='text/javascript'> document.location = 'reply_reserve.php'; </script>";
				}			
			}
			else
			{
				echo "<script>alert('Error Javascript Exception!')</script>";
			}	
		}	
	}	
?>