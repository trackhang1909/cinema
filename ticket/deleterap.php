<?php
	require_once("../conn.php");
	
	$id = $_GET["idRap"];

	// sql to delete a record
	$sql = "DELETE FROM hangghe WHERE idRap=$id";

	if ($conn->query($sql) === TRUE) {
        $sql2 = "DELETE FROM rap WHERE idRap=$id";
        if ($conn->query($sql2) === TRUE) {
            header('Location: ../admin/index.php');
        } else {
            die("Error deleting record: " . $conn->error);
        }
	} else {
		die("Error deleting record: " . $conn->error);
	}

	$conn->close();
?>