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
          <form action="editcumrap.php" method="POST" enctype="multipart/form-data">
              
            <?php
                $idcumrap = $_GET["idCumRap"];
                require_once("../conn.php");
                $sql = "SELECT * FROM cumrap WHERE idCumRap = $idcumrap";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $tencumrap = $row["tenCumRap"];
                    $diachicumrap = $row["diaChiCumRap"];
                    $idnoichieu = $row["idNoiChieu"];
                }
			?>
              
            <div class="mb-3">
              <label for="tencumrap">Tên Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="tencumrap" name="tencumrap" value="<?php echo $tencumrap?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="diachicumrap">Địa Chỉ Cụm Rạp</label>
              <div class="input-group">
                <input type="text" class="form-control" id="diachicumrap" name="diachicumrap" value="<?php echo $diachicumrap?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="idnoichieu">Cụm Rap Thuộc Nơi Chiếu - ID Nơi Chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="idnoichieu" name="idnoichieu" value="<?php echo $idnoichieu?>" required>
              </div>
            </div>
              
            <input type="hidden" name="idcumrap" value="<?php echo $idcumrap ?>">
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
              
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