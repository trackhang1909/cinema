<?php
	require_once("../conn.php");
			
    if ($_GET["ghe"] == 1) {
        $sql = "UPDATE hangghe SET " .$_GET["idGhe"]. " = 0 WHERE idRap=" . $_GET["idRap"];
    }
    if ($_GET["ghe"] == 0) {
        $sql = "UPDATE hangghe SET " .$_GET["idGhe"]. " = 1 WHERE idRap=" . $_GET["idRap"];
    }
    if ($_GET["ghe"] == 2) {
        header("Location: ../bookticket/hangghe.php?idRap=" .$_GET["idRap"]);
    }
    
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../bookticket/hangghe.php?idRap=" .$_GET["idRap"]);
	}
?>

