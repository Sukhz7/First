<?php
    include ("../include/connect.php");

    $u_id = $_POST['user_id'];

    // sql to delete a record
	$tick = "DELETE FROM ticket where user_id = $u_id";
	$par = "DELETE FROM participate where user_id = $u_id";
    $sql = "DELETE FROM user WHERE user_id = $u_id";
	
    if ($conn->query($tick) === TRUE) {
		if ($conn->query($par) === TRUE) {
			if ($conn->query($sql) === TRUE) {
				}
			}
            //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>