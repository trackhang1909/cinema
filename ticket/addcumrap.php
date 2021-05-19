<?php
	require_once("../conn.php");
	
	$tencumrap = $_POST["tencumrap"];
    $diachicumrap = $_POST["diachicumrap"];
    $idnoichieu = $_POST["idnoichieu"];
    
    $sql = "INSERT INTO cumrap (tenCumRap, diaChiCumRap, idNoiChieu)
			VALUES ('$tencumrap','$diachicumrap', '$idnoichieu')";
            
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>