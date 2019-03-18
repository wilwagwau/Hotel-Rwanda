<?php
	require_once 'includes/config.php';
	mysqli_query($conn, "DELETE FROM `tbl_users` WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysql_error());
	header("location:users.php");
?>