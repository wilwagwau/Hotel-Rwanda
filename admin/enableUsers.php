<?php 
        require_once 'includes/config.php'; 
        
        $conn->query("UPDATE `tbl_users` SET `status` = 'active' ") or die(mysqli_error());
        echo "<script type='text/javascript'> document.location = 'users.php'; </script>";
	?>