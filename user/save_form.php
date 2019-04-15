<?php
	require_once '../admin/includes/config.php';
	if(ISSET($_POST['add_form']))
	{
		$days = $_POST['days'];
		$extra_bed = $_POST['extra_bed'];

		$time = date("H:i:s", strtotime("+8 HOURS"));
		
		$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_guest` NATURAL JOIN `tbl_rooms` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$total = $fetch['room_rate'] * $days;
		$total2 = 200 * $extra_bed * $days;
		$total3 = $total + $total2;
		$checkout = date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
			
		$conn->query("UPDATE `tbl_transaction` SET `days` = '$days', `extra_bed` = '$extra_bed', `status` = 'Check In', `checkin_time` = '$time', `checkout` = '$checkout', `bill` = '$total3' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
		header("location:reservations.php");	
	}
?>