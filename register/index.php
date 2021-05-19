<?php
    session_start();
    if(!isset($_SESSION["username"])){
?>
    <style type="text/css">
        #errorUser{
            display: none;
        }
    </style>
    <style type="text/css">
        #successReg{
            display: none;
        }
    </style>
    <style type="text/css">
        #errorEmail{
            display: none;
        }
    </style>
<?php
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('images/bg-0111.jpg');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form" action="" method="POST">
                    
                    

                    <div class="login100-form-title p-b-20" style="text-align: center;">
                        Sign Up
                    </div>
                    
                    <!-- Email Error -->
                    <div id="errorEmail" class='container' style='text-align: center; color:red'>
                        Your email already exists
                        <br>
                        <br>
                    </div>
                    
                    <!-- Username Error -->
                    <div id="errorUser" class='container' style='text-align: center; color:red'>
                        Your user name already exists
                        <br>
                        <br>
                    </div>
                    
                    <!-- Registered Successfully -->
                    <div id="successReg" class='container' style='text-align: center; color:blue'>
                        Register successfully
                        <br>
                        <br>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Full Name</span>
                        <input class="input100" type="text" name="name" placeholder="Name...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Email addess...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Username...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="*************" autocomplete="on" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                        <span class="label-input100">Repeat Password</span>
                        <input class="input100" type="password" name="repeat-pass" placeholder="*************" autocomplete="on" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- <div class="flex-m w-full p-b-33">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                <span class="txt1">
                                    I agree to the
                                    <a href="#" class="txt2 hov1">
                                        Terms of User
                                    </a>
                                </span>
                            </label>
                        </div>
                    </div> -->

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Sign Up
                            </button>
                            
                        </div>

                        <a href="../login/index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                            Sign in
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>

                    
                    <!-- PHP Register Process -->
                    <?php
                        $error = 0;
                        if (isset($_POST["username"]) && isset($_POST["pass"]) && isset($_POST["repeat-pass"]) ) {
                            if ($_POST["pass"] == $_POST["repeat-pass"]){
                                $username = $_POST["username"];
                                $password = $_POST["pass"];
                                $name = $_POST["name"];
                                $email = $_POST["email"];
                                $role = "user";
                                $sql = "SELECT * FROM account WHERE username = '$username' ";
                                require_once("../conn.php");

                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                if ($result->num_rows > 0) {
                                    $error = 1;
                    ?>
                                    <!-- If user name already exists -->
                                    <style type="text/css">
                                         #errorUser{
                                            display: block;
                                        }
                                    </style>
                    <?php
                                }
                                $sql = "SELECT * FROM account WHERE email = '$email' ";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $error = 1;
                    ?>
                                    <!-- If email already exists -->
                                    <style type="text/css">
                                         #errorEmail{
                                            display: block;
                                        }
                                    </style>
                    <?php
                                }
                                /* If don't have error, register successfully */
                                if ($error == 0){
                                    $username = $_POST["username"];
                                    $password = $_POST["pass"];

                                    $sql = "INSERT INTO account (name, email, username, password, role)
                                    VALUES ('$name', '$email', '$username' , '$password', '$role')";

                                    if ($conn->query($sql) === FALSE) {
                                        die("Error: " . $sql . $conn->error);
                                    } else {
                    ?>
                                    <!-- Register successfully -->
                                    <style type="text/css">
                                         #successReg{
                                            display: block;
                                        }
                                    </style>
                    <?php
                                    }
                                }
                            }
                        }
                    ?>
                    
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>