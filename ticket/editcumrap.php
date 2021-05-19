<?php
	require_once("../conn.php");
	
	$tencumrap = $_POST["tencumrap"];
    $diachicumrap = $_POST["diachicumrap"];
    $idnoichieu = $_POST["idnoichieu"];
			
    $sql = "UPDATE cumrap SET tenCumRap='$tencumrap', diaChiCumRap='$diachicumrap', idNoiChieu='$idnoichieu' WHERE idCumRap=" . $_POST["idcumrap"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>