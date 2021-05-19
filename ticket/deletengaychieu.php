<?php
	require_once("../conn.php");
	
	$id = $_GET["idNgayChieu"];

	// sql to delete a record
	$sql = "DELETE FROM ngaychieu WHERE idNgayChieu=$id";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../admin/index.php');
	} else {
		die("Error deleting record: " . $conn->error);
	}

	$conn->close();
?>