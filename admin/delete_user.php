
<?php
	require_once 'includes/config.php';
	mysqli_query($conn, "UPDATE `tbl_users` SET `IsDeleted` = b'1', DeletedDate = CURRENT_TIMESTAMP  WHERE `user_id` = '$_REQUEST[user_id]'") or die(mysql_error());
	header("location:users.php");
?>