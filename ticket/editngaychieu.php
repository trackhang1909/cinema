<?php
	require_once("../conn.php");
	
	$ngaychieu = $_POST["ngaychieu"];
			
    $sql = "UPDATE ngaychieu SET ngayChieu='$ngaychieu' WHERE idNgayChieu=" . $_POST["idngaychieu"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>
