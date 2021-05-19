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
        <h2>Add Ticket Information</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="addngaychieu.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="ngaychieu">Ngày Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ngaychieu" name="ngaychieu" required>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
            <br>
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
          </form>
        </div>
          
        <div class="col-md order-md-1">
          <form action="adddangphim.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="dangphim">Dạng Phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="dangphim" name="dangphim" required>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
              
            <br>
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
          </form>
        </div>
          
        <div class="col-md order-md-1">
          <form action="addnoichieu.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="tennoichieu">Tên Nơi Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tennoichieu" name="tennoichieu" required>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
            
            <br>
            <div class="mb-3">
              <label for="ds">Danh Sách Nơi Chiếu:</label>
                <ul style="list-style-type:disc;">
                <?php
                    require_once("../conn.php");
                    $sql = "SELECT idNoiChieu, tenNoiChieu FROM noichieu";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                    <li>ID: <?php echo $row["idNoiChieu"]?> - <?php echo $row["tenNoiChieu"]?></li>
                <?php 
                    }
                }
                ?>
                </ul> 
            </div>
          </form>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md order-md-1">
          <form action="addgiave.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="iddangphim">ID Dạng Phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="iddangphim" name="iddangphim" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="giave">Giá Vé (VNĐ)</label>
              <div class="input-group">
                <input type="text" class="form-control" id="giave" name="giave" required>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md order-md-1">
          <form action="addcumrap.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="tencumrap">Tên Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tencumrap" name="tencumrap" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="diachicumrap">Địa Chỉ Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diachicumrap" name="diachicumrap" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="idnoichieu">Cụm Rap Thuộc Nơi Chiếu - ID Nơi Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idnoichieu" name="idnoichieu" required>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md order-md-1">
          <form action="addrap.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
              <label for="tenrap">Tên Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tenrap" name="tenrap" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="tongsoghe">Tổng Số Ghế</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tongsoghe" name="tongsoghe" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="soghetrong">Số Ghế Trống</label>
              <div class="input-group">
                <input type="text" class="form-control" id="soghetrong" name="soghetrong" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="giochieu">Giờ Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="giochieu" name="giochieu" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="idphim">ID Phim Được Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idphim" name="idphim" required>
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
                <input type="text" class="form-control" id="iddangphimrap" name="iddangphimrap" required>
              </div>
            </div>
              
            <hr>
            <div class="mb-3">
              <label for="idngaychieurap">ID Ngày Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idngaychieurap" name="idngaychieurap" required>
              </div>
            </div>
              
            <hr>
            <div class="mb-3">
              <label for="idcumrap">Rạp Thuộc Cụm Rạp - ID Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idcumrap" name="idcumrap" required>
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
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
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