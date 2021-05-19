<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ticket Information</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/Basic__54-512.png" alt="" width="72" height="72">
        <h2>Edit Ticket Information</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="editrap.php" method="POST" enctype="multipart/form-data">
              
            <?php
                $idrap = $_GET["idRap"];
                require_once("../conn.php");
                $sql = "SELECT * FROM rap WHERE idRap = $idrap";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $tenrap = $row["tenRap"];
                    $tongsoghe = $row["tongSoGhe"];
                    $soghetrong = $row["soGheTrong"];
                    $giochieu = $row["gioChieu"];
                    $idphim = $row["idPhim"];
                    $iddangphim = $row["idDangPhim"];
                    $idngaychieu = $row["idNgayChieu"];
                    $idcumrap = $row["idCumRap"];
                }
			?>
              
            <div class="mb-3">
              <label for="tenrap">Tên Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tenrap" name="tenrap" value="<?php echo $tenrap?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="tongsoghe">Tổng Số Ghế</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tongsoghe" name="tongsoghe" value="<?php echo $tongsoghe?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="soghetrong">Số Ghế Trống</label>
              <div class="input-group">
                <input type="text" class="form-control" id="soghetrong" name="soghetrong" value="<?php echo $soghetrong?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="giochieu">Giờ Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="giochieu" name="giochieu" value="<?php echo $giochieu?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="idphim">ID Phim Được Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idphim" name="idphim" value="<?php echo $idphim?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="ds">Danh Sách Phim:</label>
                <ul style="list-style-type:disc;">
                <?php
                    require_once("../conn.php");
                    $sql = "SELECT id, name FROM movieselection";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                    <li>ID: <?php echo $row["id"]?> - <?php echo $row["name"]?></li>
                <?php 
                    }
                }
                ?>
                </ul> 
            </div>  
            <hr>
            <div class="mb-3">
              <label for="iddangphimrap">ID Dạng Phim Được Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="iddangphimrap" name="iddangphimrap" value="<?php echo $iddangphim?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="ds">Danh Sách Dạng Phim:</label>
                <ul style="list-style-type:disc;">
                <?php
                    require_once("../conn.php");
                    $sql = "SELECT idDangPhim, tenDangPhim FROM dangphim";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                    <li>ID: <?php echo $row["idDangPhim"]?> - <?php echo $row["tenDangPhim"]?></li>
                <?php 
                    }
                }
                ?>
                </ul> 
            </div>  
              
            <hr>
            <div class="mb-3">
              <label for="idngaychieurap">ID Ngày Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idngaychieurap" name="idngaychieurap" value="<?php echo $idngaychieu?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="ds">Danh Sách Ngày Chiếu:</label>
                <ul style="list-style-type:disc;">
                <?php
                    require_once("../conn.php");
                    $sql = "SELECT idNgayChieu, ngayChieu FROM ngaychieu";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                    <li>ID: <?php echo $row["idNgayChieu"]?> - <?php echo $row["ngayChieu"]?></li>
                <?php 
                    }
                }
                ?>
                </ul> 
            </div> 
              
            <hr>
            <div class="mb-3">
              <label for="idcumrap">Rạp Thuộc Cụm Rạp - ID Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idcumrap" name="idcumrap" value="<?php echo $idcumrap?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="ds">Danh Sách Cụm Rạp:</label>
                <ul style="list-style-type:disc;">
                <?php
                    require_once("../conn.php");
                    $sql = "SELECT idCumRap, tenCumRap, idNoiChieu FROM cumrap";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            $sql2 = "SELECT idNoiChieu, tenNoiChieu FROM noichieu";
                            $result2 = $conn->query($sql2);
                            if (($result2->num_rows) > 0) {
                                while($row2 = $result2->fetch_assoc()) {
                                    if ($row["idNoiChieu"] == $row2["idNoiChieu"]) {
                                        $noichieu = $row2["tenNoiChieu"];
                                    }
                                }
                            }       
                ?>
                    <li>ID: <?php echo $row["idCumRap"]?> - <?php echo $row["tenCumRap"]?> - <?php echo $noichieu?></li>
                <?php
                    }
                }
                ?>
                </ul> 
            </div>
              
            <input type="hidden" name="idrap" value="<?php echo $idrap ?>">
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
          </form>
        </div>
      </div>


      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 FILM WORLD</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

</body>
    
</html>