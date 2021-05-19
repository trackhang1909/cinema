<?php
require 'login/fb-init.php';
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
    <title>
        Ticket Movies
    </title>

    <!-- CSS Bootstrap -->
    <?php include 'bootstrap.php'?>

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

    <!-- Add Navication Bar to Homepage -->
    <?php include 'navBar.php'?>

    <!-- Add Banner and MovieSelection to Homepage -->
    <div class="container">
        <br>
        <?php include 'banner.php'?>
        <br>
        <?php include 'movieselection.php'?>
        <br>
    </div>

    <!-- Add footer -->
    <?php	include 'footerfix.php'?>

    <!-- JS Bootstrap -->
    <?php include 'script.php'?>

</body>
</html>