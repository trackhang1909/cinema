<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Edit Film</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/Basic__54-512.png" alt="" width="72" height="72">
        <h2>Edit Film</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="editfilm.php" method="POST" enctype="multipart/form-data">
              
            <?php
                $id = $_GET["id"];
                require_once("../conn.php");
                $sql = "SELECT * FROM movieselection WHERE id = $id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $daodien = $row["daodien"];
                    $dienvien = $row["dienvien"];
                    $theloai = $row["theloai"];
                    $khoichieu = $row["khoichieu"];
                    $thoiluong = $row["thoiluong"];
                    $ngonngu = $row["ngonngu"];
                    $rated = $row["rated"];
                    $noidung = $row["noidung"];
                }
			?>
              
            <div class="mb-3">
              <label for="name">Name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="fileUpload">Image</label>
              <div class="input-group">
                <input type="file" id="fileUpload" name="fileUpload" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="trailerUpload">Trailer</label>
              <div class="input-group">
                <input type="file" id="trailerUpload" name="trailerUpload" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="daodien">Đạo diễn</label>
              <div class="input-group">
                <input type="text" class="form-control" id="daodien" name="daodien" value="<?php echo $daodien ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="dienvien">Diễn Viên</label>
              <div class="input-group">
                <input type="text" class="form-control" id="dienvien" name="dienvien" value="<?php echo $dienvien ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="theloai">Thể loại</label>
              <div class="input-group">
                <input type="text" class="form-control" id="theloai" name="theloai" value="<?php echo $theloai ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="khoichieu">Khởi chiếu</label>
              <div class="input-group">
                <input type="text" class="form-control" id="khoichieu" name="khoichieu" value="<?php echo $khoichieu ?>" required>
              </div>
            </div>
			
            <div class="mb-3">
              <label for="thoiluong">Thời lượng</label>
              <div class="input-group">
                <input type="text" class="form-control" id="thoiluong" name="thoiluong" value="<?php echo $thoiluong ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="ngonngu">Ngôn ngữ</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ngonngu" name="ngonngu" value="<?php echo $ngonngu ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="rated">Rated</label>
              <div class="input-group">
                <input type="text" class="form-control" id="rated" name="rated" value="<?php echo $rated ?>" required>
              </div>
            </div>
              
            <div class="mb-3">
              <label for="noidung">Nội dung</label>
              <div class="input-group">
                <textarea class="form-control" id="noidung" name="noidung" required><?php echo $noidung ?></textarea>
              </div>
            </div>
              
            <input type="hidden" name="id" value="<?php echo $id ?>">
              
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