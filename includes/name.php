<?php
	include_once '../admin/includes/config.php';
	$query = $conn->query("SELECT * FROM `tbl_users` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch1 = $query->fetch_array();
	$name = $fetch1['name'];
	$surname = $fetch1['surname'];
	$role = $fetch1['role'];
	$user_id = $fetch1['user_id'];
?>