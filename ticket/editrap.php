<?php
	require_once("../conn.php");
	
	$tenrap = $_POST["tenrap"];
    $tongsoghe = $_POST["tongsoghe"];
    $soghetrong = $_POST["soghetrong"];
    $giochieu = $_POST["giochieu"];
    $idphim = $_POST["idphim"];
    $iddangphimrap = $_POST["iddangphimrap"];
    $idngaychieurap = $_POST["idngaychieurap"];
    $idcumrap = $_POST["idcumrap"];
    
			
    $sql = "UPDATE rap SET tenRap='$tenrap', tongSoGhe='$tongsoghe', soGheTrong='$soghetrong', gioChieu='$giochieu', idPhim='$idphim', idDangPhim='$iddangphimrap', idNgayChieu='$idngaychieurap', idCumRap='$idcumrap' WHERE idRap=" . $_POST["idrap"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
        
        $sql2 = "SELECT idRap, tenRap, gioChieu, idCumRap, idPhim, idDangPhim, idNgayChieu FROM rap";
        $result2 = $conn->query($sql2);
        if (($result2->num_rows) > 0) {
            // output data of each row
            while ($row2 = $result2->fetch_assoc()) {
                $gio2 = $giochieu.":00";
                $gio3 = $row2["gioChieu"];
                if ($tenrap === $row2["tenRap"] && (($gio2 - $gio3) === 0) && $idcumrap === $row2["idCumRap"] && $iddangphimrap === $row2["idDangPhim"] && $idngaychieurap === $row2["idNgayChieu"] && $idphim === $row2["idPhim"]) {
                    $idhangghe = $row2["idRap"];

                    for ($x = 1; $x <= ($tongsoghe/10); $x++) {
                        $z = 1;
                        if ($x == 1) {
                            $y = "A";
                        }
                        if ($x == 2) {
                            $y = "B";
                        }
                        if ($x == 3) {
                            $y = "C";
                        }
                        if ($x == 4) {
                            $y = "D";
                        }
                        if ($x == 5) {
                            $y = "E";
                        }

                        $y1 = $y.$z;
                        $y2 = $y.($z+1);
                        $y3 = $y.($z+2);
                        $y4 = $y.($z+3);
                        $y5 = $y.($z+4);
                        $y6 = $y.($z+5);
                        $y7 = $y.($z+6);
                        $y8 = $y.($z+7);
                        $y9 = $y.($z+8);
                        $y10 = $y.($z+9);

                        $sql3 .= "UPDATE hangghe SET " . $y1 . " = 1, " . $y2 . " = 1, " . $y3 . " = 1, " . $y4 . " = 1, " . $y5 . " = 1, " . $y6 . " = 1, " . $y7 . " = 1, " . $y8 . " = 1, " . $y9 . " = 1, " . $y10 . " = 1" . " WHERE idRap = " .$idhangghe. ";";
                    }

                    if ($conn->multi_query($sql3) === FALSE) {
                        die("Error: " . $sql3 ."<br>". $conn->error);
                    } else {
                        header("Location: ../admin/index.php");
                    }
                }
            }
        }
	}
?>