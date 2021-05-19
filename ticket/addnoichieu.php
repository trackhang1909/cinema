<?php
	require_once("../conn.php");
	
	$tennoichieu = $_POST["tennoichieu"];
    
    $sql = "INSERT INTO noichieu (tenNoiChieu)
			VALUES ('$tennoichieu')";
            
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>