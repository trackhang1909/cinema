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