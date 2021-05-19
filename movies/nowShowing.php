<?php
session_start();
if (!isset($_SESSION["username"])) {
    ?>
        <style type="text/css">
            #userDropdown{
                display: none;
            }
        </style>
<?php
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
    <title>
        Now Showing
    </title>
    <link rel="stylesheet" href="../css/movieselection.css">

    <!-- CSS Bootstrap -->
    <?php include '../bootstrap.php'?>

    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }
        #toHideAddFilm{
            display: none;
        }
        .hrTag{
            display: none;
        }
        .hideUser{
            isplay: none;
        }
    </style>

</head>

<body>

    <!-- Add Navication Bar to Homepage -->
    <?php include 'navBar.php'?>
	<br>
    <div class="container">

    	<div id="movieselection-title">
            <h1>
                <p id="eftext">⌈ NOW SHOWING ⌋</p>
            </h1>
        </div>
        <br>
		<div class="card-deck">
			<div class="row">
				<?php
                    require_once("../conn.php");
                    $sql = "SELECT * FROM movieselection where status = '1'";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-4">
                <div class="card ">
                    <img src="../img-uploads/<?php echo $row["image"] ?>" class="card-img-top" width="250px" height="400px"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"]?></h5>
                        
	                    <p> <b>Thể loại:</b> <?php echo $row["theloai"] ?></p>
	                    <p> <b>Khởi chiếu:</b> <?php echo $row["khoichieu"] ?></p>
	                    <p> <b>Thời lượng:</b> <?php echo $row["thoiluong"] ?></p>
                        <button class="button trailer" type="button"><a href="../film/trailer.php?id=<?php echo $row["id"] ?>">Trailer</a></button>
                        <button class="button detail" type="button"><a
                                href="../film/detail.php?id=<?php echo $row["id"] ?>">Xem chi tiết</a></button>
                        <button class="button ticket" type="button"><a href="../bookticket/bookticket.php?id=<?php echo $row["id"] ?>">Đặt vé</a></button>
                        <hr class="hrTag">
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Khởi chiếu: <?php echo $row["khoichieu"]?></small>
                    </div>
                </div>
                <br>
                </div>

                <?php 
                    }
                }
                ?>
			</div>


                
        </div>
    </div>
	<br>	
    <!-- Add footer -->
    <?php	include '../footerfix.php'?>

    <!-- JS Bootstrap -->
    <?php include '../script.php'?>

</body>
</html>