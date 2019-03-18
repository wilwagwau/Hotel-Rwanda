<?php
	session_start();
	session_unset(user_id);
	header("location:login.php");
?>