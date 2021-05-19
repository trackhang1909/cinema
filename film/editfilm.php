<?php
	require_once("../conn.php");
	
	$name = $_POST["name"];
	$daodien = $_POST["daodien"];
    $dienvien = $_POST["dienvien"];
    $theloai = $_POST["theloai"];
    $khoichieu = $_POST["khoichieu"];
    $thoiluong = $_POST["thoiluong"];
    $ngonngu = $_POST["ngonngu"];
    $rated = $_POST["rated"];
    $noidung = $_POST["noidung"];

	$target_dir = "../img-uploads/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
			
    $target_dir = "../vie-uploads/";
	$file_name2 = basename($_FILES["trailerUpload"]["name"]);
	$target_file = $target_dir . $file_name2;
	
	if (!move_uploaded_file($_FILES["trailerUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
			
    $sql = "UPDATE movieselection SET name='$name', image='$file_name', trailer='$file_name2', daodien='$daodien', dienvien='$dienvien', theloai='$theloai', khoichieu='$khoichieu', thoiluong='$thoiluong', ngonngu='$ngonngu', rated='$rated', noidung='$noidung'  WHERE id=" . $_POST["id"];
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../admin/index.php");
	}
?>
















