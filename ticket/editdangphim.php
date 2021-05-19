<?php
	require_once("../conn.php");
	
	$dangphim = $_POST["dangphim"];
			
    $sql = "UPDATE dangphim SET tenDangPhim='$dangphim' WHERE idDangPhim=" . $_POST["iddangphim"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>
