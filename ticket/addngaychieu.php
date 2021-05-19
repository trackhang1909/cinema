<?php
	require_once("../conn.php");
	
	$ngaychieu = $_POST["ngaychieu"];

    $sql = "INSERT INTO ngaychieu (ngayChieu)
			VALUES ('$ngaychieu')";
            

	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>