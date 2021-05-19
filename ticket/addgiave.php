<?php
	require_once("../conn.php");
	
	$iddangphim = $_POST["iddangphim"];
    $giave = $_POST["giave"];
    
    $sql = "INSERT INTO giave (idGiaVe, giaTien)
			VALUES ('$iddangphim', '$giave')";
            
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>