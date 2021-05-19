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
    <?php include '../bootstrap.php'?>

    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        #toHideAddFilm{
            display: none;
        }

        .footer{
            position: fixed;
            bottom: 0;
        }
    </style>

</head>
    
<body>
    <?php require_once "navBar.php" ?>
    <div class="container">
        <br>
        <hr class="hrTag">
            <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
                <td>
                    <a class="hideUser" href="../ticket/formaddticketinformation.php">Add Ticket Information</a>
                </td>
            </tr>
        <hr>
        <br>
        <?php
            require_once("../conn.php");
            $sql = "SELECT idNgayChieu, ngayChieu FROM ngaychieu";
            $result = $conn->query($sql);
            if (($result->num_rows) > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
            <button type="button" class="ngaychieu btn" value="<?php echo $row["idNgayChieu"]?>"><?php echo $row["ngayChieu"]?></button>
            <a class="hideUser" href="../ticket/formeditngaychieu.php?idNgayChieu=<?php echo $row["idNgayChieu"] ?>">Edit</a>
            <a>|</a>
            <a class="hideUser" href="../ticket/deletengaychieu.php?idNgayChieu=<?php echo $row["idNgayChieu"] ?>">Delete</a>
        <?php 
                }
            }
        ?>
        <!-- ========================================================================================================== -->
        <hr>
        <?php
            require_once("../conn.php");
            $sql = "SELECT idNoiChieu, tenNoiChieu FROM noichieu";
            $result = $conn->query($sql);
            if (($result->num_rows) > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
            <button type="button" class="noichieu btn" value="<?php echo $row["idNoiChieu"]?>"><?php echo $row["tenNoiChieu"]?></button>
            <a class="hideUser" href="../ticket/formeditnoichieu.php?idNoiChieu=<?php echo $row["idNoiChieu"] ?>">Edit</a>
            <a>|</a>
            <a class="hideUser" href="../ticket/deletenoichieu.php?idNoiChieu=<?php echo $row["idNoiChieu"] ?>">Delete</a>
        <?php 
            }
        }
        ?>
        <hr>
        <!-- ========================================================================================================== -->
        <?php
            require_once("../conn.php");
            $sql = "SELECT idDangPhim, tenDangPhim FROM dangphim";
            $result = $conn->query($sql);
            if (($result->num_rows) > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
            <button type="button" class="dangphim btn" value="<?php echo $row["idDangPhim"]?>"><?php echo $row["tenDangPhim"]?></button>
            <a class="hideUser" href="../ticket/formeditdangphim.php?idDangPhim=<?php echo $row["idDangPhim"] ?>">Edit</a>
            <a>|</a>
            <a class="hideUser" href="../ticket/deletedangphim.php?idDangPhim=<?php echo $row["idDangPhim"] ?>">Delete</a>
        <?php 
            }
        }
        ?>
        <hr>
        <!-- ========================================================================================================== -->
        <?php
            require_once("../conn.php");
            $sql = "SELECT idRap, tenRap, tongSoGhe, soGheTrong, gioChieu, idPhim, idDangPhim, idNgayChieu, idCumRap FROM rap";
            $result = $conn->query($sql);
            //GET id in table movie
            $id = $_GET["id"];
            if (($result->num_rows) > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    
                            if ($id === $row["idPhim"]) {
                    
                                $sql2 = "SELECT idCumRap, tenCumRap, idNoiChieu FROM cumrap";
                                $result2 = $conn->query($sql2);
                                if (($result2->num_rows) > 0) {
                                    // output data of each row
                                    while($row2 = $result2->fetch_assoc()) {
                                        if ($row["idCumRap"] == $row2["idCumRap"]) {
                                            $tencumrap = $row2["tenCumRap"];

                                            $sql3 = "SELECT idNoiChieu FROM noichieu";
                                            $result3 = $conn->query($sql3);
                                            if (($result3->num_rows) > 0) {
                                                // output data of each row
                                                while($row3 = $result3->fetch_assoc()) {
                                                    if ($row2["idNoiChieu"] == $row3["idNoiChieu"]) {
                                                        $idnoichieu = $row3["idNoiChieu"];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }     
        ?>
            <h5 style="color:#878276"><?php echo $tencumrap?>
                <a class="hideUser"  href="../ticket/formeditcumrap.php?idCumRap=<?php echo $row["idCumRap"] ?>">Edit</a>
                <a>   </a>
                <a class="hideUser" href="../ticket/deletecumrap.php?idCumRap=<?php echo $row["idCumRap"] ?>">Delete</a>
            </h5>
            <p><?php echo $row["tenRap"]?>
                <a class="hideUser" href="../ticket/formeditrap.php?idRap=<?php echo $row["idRap"] ?>">Edit</a>
                <a></a>
                <a class="hideUser" href="../ticket/deleterap.php?idRap=<?php echo $row["idRap"] ?>">Delete</a>
            </p> <!-- 0 -->
            <p><?php echo $row["tongSoGhe"]?></p> <!-- 1 -->
            <p><?php echo $row["soGheTrong"]?></p> <!-- 2 -->
            <p><?php echo $row["gioChieu"]?></p> <!-- 3 -->
            <p><?php echo $row["idPhim"]?></p> <!-- 4 -->
            <p><?php echo $row["idDangPhim"]?></p> <!-- 5 -->
            <p><?php echo $row["idNgayChieu"]?></p> <!-- 6 -->
            <p><?php echo $row["idCumRap"]?></p> <!-- 7 -->
            <p><?php echo $idnoichieu?></p> <!-- 8 -->
            <button type="button" class="rap btn btn-outline-dark">
                <a  style="color:black" href="../bookticket/hangghe.php?idRap=<?php echo $row["idRap"] ?>">
                    <?php echo $row["gioChieu"]?><br><?php echo $row["soGheTrong"]?> ghế trống
                </a>
            </button>
            <hr class="hrrap">
        <?php 

                }
            }
        }
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
        
        $("p:gt(0)").hide();
        $("p:eq(0)").hide();
        $(".rap:gt(0)").hide();
        $(".rap:eq(0)").hide();
        
        var ngaychieu = $(".ngaychieu:eq(0)").val();
        var noichieu = $(".noichieu:eq(0)").val();
        var dangphim = $(".dangphim:eq(0)").val();
        var lengthp = $("p").length;
        
        $(".ngaychieu:eq(0)").css({'color':'white','background':'#555555'});
        $(".noichieu:eq(0)").css({'color':'white','background':'#555555'});
        $(".dangphim:eq(0)").css({'color':'white','background':'#555555'});
        
        //Kiem tra rap
        var x = 0;
        for (var i = 0; i < lengthp; i++) {
            if($("p:eq(" + (i+5) + ")").text() == dangphim & $("p:eq(" + (i+6) + ")").text() == ngaychieu & $("p:eq(" + (i+8) + ")").text() == noichieu) {
                $("p:eq(" + i + ")").show();
                $(".rap:eq(" + x + ")").show();
                $("h5:eq(" + x + ")").show();
                $(".hrrap:eq(" + x + ")").show();
            }
            else {
                $("p:eq(" + i + ")").hide();
                $(".rap:eq(" + x + ")").hide();
                $("h5:eq(" + x + ")").hide();
                $(".hrrap:eq(" + x + ")").hide();
            }
            x++;
            i = i + 8;
        }
        
        $(".ngaychieu").click(function() {
            $(".ngaychieu").css({'color':'#555555','background':'white'});
            $(this).css({'color':'white','background':'#555555'});
            ngaychieu = $(this).val();
            //Kiem tra rap
            var x = 0;
            for (var i = 0; i < lengthp; i++) {
                if($("p:eq(" + (i+5) + ")").text() == dangphim & $("p:eq(" + (i+6) + ")").text() == ngaychieu & $("p:eq(" + (i+8) + ")").text() == noichieu) {
                    $("p:eq(" + i + ")").show();
                    $(".rap:eq(" + x + ")").show();
                    $("h5:eq(" + x + ")").show();
                    $(".hrrap:eq(" + x + ")").show();
                }
                else {
                    $("p:eq(" + i + ")").hide();
                    $(".rap:eq(" + x + ")").hide();
                    $("h5:eq(" + x + ")").hide();
                    $(".hrrap:eq(" + x + ")").hide();
                }
                x++;
                i = i + 8;
            }
        })
        
        $(".noichieu").click(function() {
            $(".noichieu").css({'color':'#555555','background':'white'});
            $(this).css({'color':'white','background':'#555555'});
            noichieu = $(this).val();
            //Kiem tra rap
            var x = 0;
            for (var i = 0; i < lengthp; i++) {
                if($("p:eq(" + (i+5) + ")").text() == dangphim & $("p:eq(" + (i+6) + ")").text() == ngaychieu & $("p:eq(" + (i+8) + ")").text() == noichieu) {
                    $("p:eq(" + i + ")").show();
                    $(".rap:eq(" + x + ")").show();
                    $("h5:eq(" + x + ")").show();
                    $(".hrrap:eq(" + x + ")").show();
                }
                else {
                    $("p:eq(" + i + ")").hide();
                    $(".rap:eq(" + x + ")").hide();
                    $("h5:eq(" + x + ")").hide();
                    $(".hrrap:eq(" + x + ")").hide();
                }
                x++;
                i = i + 8;
            }
        })
        
        $(".dangphim").click(function() {
            $(".dangphim").css({'color':'#555555','background':'white'});
            $(this).css({'color':'white','background':'#555555'});
            dangphim = $(this).val();
            //Kiem tra rap
            var x = 0;
            for (var i = 0; i < lengthp; i++) {
                if($("p:eq(" + (i+5) + ")").text() == dangphim & $("p:eq(" + (i+6) + ")").text() == ngaychieu & $("p:eq(" + (i+8) + ")").text() == noichieu) {
                    $("p:eq(" + i + ")").show();
                    $(".rap:eq(" + x + ")").show();
                    $("h5:eq(" + x + ")").show();
                    $(".hrrap:eq(" + x + ")").show();
                }
                else {
                    $("p:eq(" + i + ")").hide();
                    $(".rap:eq(" + x + ")").hide();
                    $("h5:eq(" + x + ")").hide();
                    $(".hrrap:eq(" + x + ")").hide();
                }
                x++;
                i = i + 8;
            }
        })
    </script>
    
</body>
    
</html>