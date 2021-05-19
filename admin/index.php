<?php
    session_start();
    if(!isset($_SESSION["username"])){
?>
        <style type="text/css">
            #logout{
                display: none;
            }
        </style>
<?php
    header('Location: ../login/index.php');
    } else {
        $username = $_SESSION["username"];
        if (isset($_SESSION["role"])){
            if ($_SESSION["role"] != "admin"){
                header('Location: ../index.php');
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
        Edit Data
    </title>

    <!-- CSS Bootstrap -->
    <?php require "../bootstrap.php" ?>

    <style>
    .dropdown:hover>.dropdown-menu {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Add Navication Bar to Homepage -->
    <?php require_once "navBar.php" ?>
    
    <!-- Add Banner and MovieSelection to Homepage -->
    <div class="container">
        <?php require_once "movieselection.php"?>
        <br>
    </div>

    <!-- Add footer -->
    <?php require_once "../footerfix.php" ?>

    <!-- JS Bootstrap -->
    <?php require_once "../script.php" ?>

</body>

</html>