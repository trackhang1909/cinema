<?php
	require_once("../conn.php");
	
	$id = $_GET["idCumRap"];

	// sql to delete a record
	$sql = "DELETE FROM cumrap WHERE idCumRap=$id";

	if ($conn->query($sql) === TRUE) {
		header('Location: ../admin/index.php');
	} else {
		die("Error deleting record: " . $conn->error);
	}

	$conn->close();
?>