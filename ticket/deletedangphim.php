<?php
	require_once("../conn.php");
	
	$id = $_GET["idDangPhim"];

	// sql to delete a record
	$sql = "DELETE FROM dangphim WHERE idDangPhim=$id";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../admin/index.php');
	} else {
		die("Error deleting record: " . $conn->error);
	}

	$conn->close();
?>