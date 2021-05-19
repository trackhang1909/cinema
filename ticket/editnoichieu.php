<?php
	require_once("../conn.php");
	
	$tennoichieu = $_POST["tennoichieu"];
			
    $sql = "UPDATE noichieu SET tenNoiChieu='$tennoichieu' WHERE idNoiChieu=" . $_POST["idnoichieu"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>

