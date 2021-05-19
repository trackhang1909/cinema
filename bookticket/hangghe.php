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
    <title>Row Of Seats</title>
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
        }
    </style>
</head>
    
<body>
    <?php require_once "navBar.php" ?>
    <div class="container">
        <br><br>
        <h4 align="center">ROW OF SEATS</h4>
        <?php
            $id = $_GET["idRap"];
        ?>
        <a href="datve.php?id=<?php echo $id ?>">Đặt Vé</a>
        <br><br>
        <div class="row">
            
            <?php
                $id = $_GET["idRap"];
                require_once("../conn.php");
                $sql = "SELECT * FROM hangghe WHERE idRap = $id";
                $result = $conn->query($sql);
                $sql2 = "SELECT * FROM rap WHERE idRap = $id";
                $result2 = $conn->query($sql2);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                        if ($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc();

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
                                
                                
            ?>
            <div class="col-2">
                <button type="submit" class="hangghe btn btn-outline-dark col-10" value="<?php echo $row["$z"]?>">
                    <a href="deletehangghe.php?idRap=<?php echo $id ?>&idGhe=<?php echo $z?>&ghe=<?php echo $row["$z"]?>"><?php echo $z?></a>
                </button>
            </div>
            <?php
                                
                                $p++;
                        }
                    }
                }
            ?>
        </div>
    </div>
    <?php include '../footerfix.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
        
        var lengthhg = $(".hangghe").length;
        
        for (var i = 0; i < lengthhg; i++) {
            if ($(".hangghe:eq(" + i + ")").val() == 2) {
                $(".hangghe:eq(" + i + ")").css({'color':'white','background':'#555555'});
            }
            if ($(".hangghe:eq(" + i + ")").val() == 0) {
                $(".hangghe:eq(" + i + ")").css({'color':'white','background':'#f22e2e'});
            }
        }
        
    </script>
</body>
    
</html>