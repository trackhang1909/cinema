<?php
	require_once("../conn.php");
	
	$dangphim = $_POST["dangphim"];

    $sql = "INSERT INTO dangphim (tenDangPhim)
			VALUES ('$dangphim')";
            
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>