<?php 
    require_once '../admin/includes/config.php'; 
    $query = $conn->query("SELECT * FROM `tbl_transaction` NATURAL JOIN `tbl_rooms` WHERE `transaction_id` = '$_REQUEST[transaction_id]' ") or die(mysqli_error());	
	$row = $query->fetch_array();

    $queryCancel = $conn->query("UPDATE `tbl_transaction` SET `status` = 'Cancelled' WHERE  `transaction_id` LIKE $_REQUEST[transaction_id] ") or die(mysqli_error($conn));
    if($queryCancel==1)
    {
       	$conn->query("UPDATE `tbl_rooms` SET `room_status` = 1 WHERE `room_id` = '$row[room_id]' ") or die(mysqli_error());
        echo "<script type='text/javascript'> document.location = 'calcelled.php'; </script>";
    }
        
?>