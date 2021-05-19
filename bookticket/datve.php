<?php
    session_start();
    if(!isset($_SESSION["username"])){
?>
        <style type="text/css">
            #logout{
                display: none;
            }
        </style>
<?php
    header('Location: ../login/index.php');
    } else {
        $username = $_SESSION["username"];
        if (isset($_SESSION["role"])){
            if ($_SESSION["role"] != "admin"){
?>
                <style type="text/css">
                    #editRap{
                      display: none;
                    }
                    #editData{
                      display: none;
                    }
                    .hideUser{
                        display: none;
                    }
                    .hrTag{
                        display: none;
                    }
                </style>
<?php
            }
        }
?>
        <style type="text/css">
            .hideDropdown{
                display: none;
            }
        </style>
<?php
    }
?>

<!DOCTYPE html>
<html>
    
<head>
    <title>Book Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php require_once "../bootstrap.php" ?>
    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        #toHideAddFilm{
            display: none;
        }
        
        .footer{
            position: fixed;
            bottom: 0px;
        }
    </style>
</head>
    
<body>
    <?php require_once "navBar.php" ?>
    <div class="container">
        <br><br>
        <?php
            $id = $_GET["id"];
            $idname = $username;
            require_once("../conn.php");
            $sql4 = "SELECT id, name, email FROM account WHERE username = $idname";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $row4 = $result4->fetch_assoc();
                $name = $row4["name"];
                $email = $row4["email"];
                $idaccount = $row4["id"];
            }
            $sql = "SELECT * FROM hangghe WHERE idRap = $id";
            $result = $conn->query($sql);
            $sql2 = "SELECT * FROM rap WHERE idRap = $id";
            $result2 = $conn->query($sql2);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                        $iddangphim = $row2["idDangPhim"];
                        $tenrap = $row2["tenRap"];
                        $idcumrap = $row2["idCumRap"];
                        //lay gia tien
                        $sql5 = "SELECT * FROM giave WHERE idGiaVe = $iddangphim";
                        $result5 = $conn->query($sql5);
                        if ($result5->num_rows > 0) {
                            $row5 = $result5->fetch_assoc();
                            $giatien = $row5["giaTien"];
                        }
                        //lay loai ve
                        $sql6 = "SELECT * FROM dangphim WHERE idDangPhim = $iddangphim";
                        $result6 = $conn->query($sql6);
                        if ($result6->num_rows > 0) {
                            $row6 = $result6->fetch_assoc();
                            $loaive = $row6["tenDangPhim"];
                        }
                        //in ra man hinh ghe da dat
                        $sgt = 0;
                        $sovedat = 0;
                        for ($x = 1; $x <= ($row2["tongSoGhe"]); $x++) {
                            if ($x == 1) {
                                $y = "A";
                                $p = 1;
                            }
                            if ($x == 11) {
                                $y = "B";
                                $p = 1;
                            }
                            if ($x == 21) {
                                $y = "C";
                                $p = 1;
                            }
                            if ($x == 31) {
                                $y = "D";
                                $p = 1;
                            }
                            if ($x == 41) {
                                $y = "E";
                                $p = 1;
                            }

                            $z = $y.$p;
                            
                            if ($row["$z"] == 0) {
        ?>
            <p>Ghế đã đặt: <?php echo $z ?></p>
        <?php
            $sql3 = "UPDATE hangghe SET " .$z. " = 2 WHERE idRap=" . $id;
            $conn->query($sql3);
            $sgt++; 
            $sovedat++;
                            }
                            $p++;
                    }
                    $sql4 = "UPDATE rap SET soGheTrong = ". ($row2["soGheTrong"] - $sgt) ." WHERE idRap=" . $id;
                    $conn->query($sql4);
                }
            }
            
            $idphim = $row2["idPhim"];
    
            $sql7 = "SELECT name FROM movieselection WHERE id = $idphim";
            $result7 = $conn->query($sql7);
            if ($result7->num_rows > 0) {
                $row7 = $result7->fetch_assoc();
                $tenphim = $row7["name"];
            }             
    
            $sql6 = "SELECT tenCumRap FROM cumrap WHERE idCumRap = $idcumrap";
            $result6 = $conn->query($sql6);
            if ($result6->num_rows > 0) {
                $row6 = $result6->fetch_assoc();
                $tencumrap = $row6["tenCumRap"];
            }        
    
            $tongtien = ($sovedat * $giatien);
            $sql5 = "INSERT INTO thongtinve (idNguoiDung, tongSoTien, loaiVe, tenRap, tenCumRap, tenPhim) VALUES ('$idaccount', '$tongtien', '$loaive','$tenrap','$tencumrap','$tenphim')";
            $conn->query($sql5);
        ?>
        <p><b>Thông tin người dùng: </b></p>
        <p>Họ Tên: <?php echo $name ?></p>
        <p>Email: <?php echo $email ?></p>
        <p>Tổng giá vé: <?php echo ($sovedat * $giatien) ?> VNĐ</p>
        <a href="../admin/index.php">Trở Về Trang Chủ</a>
    </div>
    <?php include '../footerfix.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    
</html>