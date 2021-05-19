<!DOCTYPE html>
<html>
    
<head>
    <title>Revenue</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    
<body>
    <div class="container">
        <br>
        <?php
            require_once("../conn.php");
            $tongdoanhthu = 0;
            $sql = "SELECT * FROM thongtinve";
            $result = $conn->query($sql);
            if (($result->num_rows) > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    
                    $sql2 = "SELECT * FROM account";
                    $result2 = $conn->query($sql2);
                    if (($result2->num_rows) > 0) {
                        // output data of each row
                        while ($row2 = $result2->fetch_assoc()) {
                            if ($row["idNguoiDung"] == $row2["id"]) {
        ?>
            <p>Họ Tên: <?php echo $row2["name"] ?> - Email: <?php echo $row2["email"] ?> - Tổng Số Tiền: <?php echo $row["tongSoTien"] ?> - Loại Vé: <?php echo $row["loaiVe"] ?> - Tên Phim: <?php echo $row["tenPhim"] ?> - Tên Rạp: <?php echo $row["tenRap"] ?> - Tên Cụm Rạp: <?php echo $row["tenCumRap"] ?></p>
        <?php 
                            $tongdoanhthu = $tongdoanhthu + $row["tongSoTien"];
                        }
                    }
                }
            }
        }
        ?>
        <h6>Tổng Doanh Thu: <?php echo $tongdoanhthu ?> VND</h6>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
    
</html>