<?php
    require '../login/fb-init.php';
    if(!isset($_SESSION["username"]) and !isset($_SESSION["accessToken"])){
?>
        <!-- CSS hiện logout khi có account đăng nhập -->
        <style type="text/css">
            #logout{
                display: none;
            }
        </style>
<?php
      // Nếu không có account, chuyển sang trang đăng nhập
      header('Location: ../login/index.php');
    } else {
      if (isset($_SESSION["role"])){
        $username = $_SESSION["username"];
          if ($_SESSION["role"] != "admin"){
?>
            <!-- CSS ẩn edit data -->
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
        <!-- CSS ẩn dropdown đăng kí/đăng nhập -->
        <style type="text/css">
            .hideDropdown{
                display: none;
            }
        </style>
<?php
    }
?>
<!-- Facebook API -->
<?php if (isset($_SESSION['accessToken'])):?>   <!-- Khi có tài khoản đăng nhập bằng FB -->
    <!-- Ẩn đăng kí/đăng nhập -->
    <style type="text/css">
        .hideDropdown{
            display: none;
        }
        #userDropdown{
            display: block;
        }
        .forAdmin{
            display: none;
        }
    </style>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Infomation</title>
  <meta charset="UTF-8">
  <?php require_once("../bootstrap.php");  ?>
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
            display: none;
        }
    </style>
</head>
<body>
  <?php require_once("navBar.php"); ?>
  <br><br><br><br>
  <div class="card mx-auto" style="width: 25rem;">
    <?php
      if (!isset($_SESSION['accessToken'])){
        // Lấy lại tên username
        $getUsername = $username;

        // Kết nối database
        require_once("../conn.php");
        $sql = "SELECT * FROM account WHERE username = '".$getUsername."'";

        $result = $conn->query($sql);

        // var_dump($result);
        
        if (($result->num_rows) > 0) {
          $row = $result->fetch_assoc();
        }
      }
        // $row = $result->fetch_assoc();
    
    ?>
    <img width="400" height="300" src="../images/44948.png" class="card-img-top" alt="..." >
    <div class="card-body">
      <h5 class="card-title"><b><u>Infomation</u></b></h5>
    </div>
    <ul class="list-group list-group-flush">
      <!-- Hiển thị Username -->
      <li class="list-group-item">Username: <b><?php if (isset($_SESSION['accessToken'])):echo $username; else: echo $getUsername; endif; ?></b></li>

      <!-- Hiển thị Name -->
      <li class="list-group-item">Name: <b><?php if (!isset($_SESSION['accessToken'])):echo $row["name"]; else: echo $username; endif;?></b></li>

      <!-- Hiển thị Email -->
      <li class="list-group-item">Email: <b><?php if (!isset($_SESSION['accessToken'])):echo $row["email"]; endif;?></b></li>
    </ul>
    <!-- <div class="card-body">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div> -->
  </div>
  <br><br><br><br>
  <!-- Add footer -->
  <?php require_once("../footerfix.php"); ?>

  <?php require_once("../script.php") ?>

  
</body>
</html>