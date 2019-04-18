<?php
	require_once '../admin/includes/config.php';
	$time = date("H:i:s", strtotime("+8 HOURS"));
	$query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_rooms` WHERE `transaction_id` = '$_REQUEST[transaction_id]' ") or die(mysqli_error());	
	$row = $query->fetch_array();
	$reserveQuer = $conn->query("UPDATE `tbl_transaction` SET `checkout_time` = '$time', `status` = 'Check Out' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
	if($reserveQuer==1)
	{
		$conn->query("UPDATE `tbl_rooms` SET `room_status` = 1 WHERE `room_id` = '$row[room_id]' ") or die(mysqli_error());
		echo "<script type='text/javascript'> document.location = 'reservations.php'; </script>";
	}
?>