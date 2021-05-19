<?php
require '../login/fb-init.php';
if (!isset($_SESSION["username"])) {
    ?>
        <style type="text/css">
            #userDropdown{
                display: none;
            }
        </style>
<?php
} else {
    if (isset($_SESSION["role"])){
        $username = $_SESSION["username"];
        if ($_SESSION["role"] != "admin"){
?>
            <style type="text/css">
                #editRap{
                  display: none;
                }
                #editData{
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

<?php if (isset($_SESSION['accessToken'])): ?>
    <style type="text/css">
        .hideDropdown{
            display: none;
        }
    </style>
    <style type="text/css">
        #userDropdown{
            display: block;
        }
    </style>
    <style type="text/css">
        .forAdmin{
            display: none;
        }
    </style>
<?php endif; ?>

<!DOCTYPE html>
<html>
    <head>
        <?php require "../bootstrap.php" ?>

        <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        </style>
        
        <title>Detail Of Film</title>
    </head>
    
    <body>
        <?php include 'navBar.php'; ?>
        <div class="container">
            <?php
                require_once("../conn.php");
                $sql = "SELECT id, name, image, daodien, dienvien, theloai, khoichieu, thoiluong, ngonngu, rated, noidung FROM movieselection";
                $result = $conn->query($sql);
                //GET id in table movie
                $id = $_GET["id"];
                //---------------------------
                if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if ($id === $row["id"]) {
            ?>
            
            <br>
            <h2>Nội Dung Phim</h2>
            <hr>
            <div class="clearfix">
                <img src="../img-uploads/<?php echo $row["image"] ?>" class="float-left" width="250px" height="400px" alt="...">
                <div class="float-left" style="padding-left: 30px">
                    <h2><?php echo $row["name"] ?></h2>
                    <hr>
                    <p> <b>Đạo diễn:</b> <?php echo $row["daodien"] ?></p>
                    <p style="width: 830px"> <b>Diễn viên:</b> <?php echo $row["dienvien"] ?></p>
                    <p> <b>Thể loại:</b> <?php echo $row["theloai"] ?></p>
                    <p> <b>Khởi chiếu:</b> <?php echo $row["khoichieu"] ?></p>
                    <p> <b>Thời lượng:</b> <?php echo $row["thoiluong"] ?></p>
                    <p> <b>Ngôn ngữ:</b> <?php echo $row["ngonngu"] ?></p>
                    <p> <b>Rated:</b> <?php echo $row["rated"] ?></p>
                </div>
            </div>
            <hr>
            <p><?php echo $row["noidung"] ?></p>
            
            <?php
                        }
                    }
                }
            ?>
            <br><br>
        </div>
        <?php require_once "../footerfix.php" ?>
        <?php require_once "../script.php" ?>
    </body>
</html>