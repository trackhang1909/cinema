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
          <form action="editdangphim.php" method="POST" enctype="multipart/form-data">
              
            <?php
                $iddangphim = $_GET["idDangPhim"];
                require_once("../conn.php");
                $sql = "SELECT * FROM dangphim WHERE idDangPhim = $iddangphim";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $dangphim = $row["tenDangPhim"];
                }
			?>
              
            <div class="mb-3">
              <label for="dangphim">Dạng Phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="dangphim" name="dangphim" value="<?php echo $dangphim?>" required>
              </div>
            </div>
              
            <input type="hidden" name="iddangphim" value="<?php echo $iddangphim ?>">
              
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
              
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