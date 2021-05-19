<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo-brand.png" width="85" height="45" alt="">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="row align-items-start navbar-nav ml-auto mr-auto">
            <!-- Item MOVIES -->
            <li class="col nav-item dropdown ">
                <a class="text-danger bg-light nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> PHIM </a>

                <div class="bg-light dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="bg-transparent text-danger dropdown-item" href="movies/nowShowing.php">Phim Đang Chiếu</a>
                    <a class="bg-transparent text-danger dropdown-item" href="movies/comingShow.php">Phim Sắp Chiếu</a>
                </div>
            </li>

            <!-- Item RAP  -->
            <!-- <li class="col nav-item dropdown">
                <a class="text-danger bg-light nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> RẠP </a>
                <div class="bg-light dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="bg-transparent text-danger dropdown-item" href="#">Tất cả các rạp</a>
                    <a class="bg-transparent text-danger dropdown-item" href="#">Rạp đặc biệt</a>
                </div>
            </li> -->

            <!-- Item TAIKHOAN	 -->
            <li class="col nav-item dropdown hideDropdown">
                <a class="text-danger bg-light nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> TÀI KHOẢN </a>
                <div class="bg-light dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="bg-transparent text-danger dropdown-item" href="register/index.php">Đăng kí</a>
                    <a class="bg-transparent text-danger dropdown-item" href="login/index.php">Đăng nhập</a>
                </div>
            </li>
            
            <!-- USER dropdown -->
            <li class="col nav-item dropdown" id="userDropdown">
                <a class="text-danger bg-light nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> TÀI KHOẢN </a>
                <div class="bg-light dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <span class="bg-transparent text-info dropdown-item" href="">Xin chào, <b><?php echo $username; ?></b></span>
                    <a class="forAdmin bg-transparent text-danger dropdown-item" id="editData" href="admin/index.php">Chỉnh sửa dữ liệu</a>
                    <a class="bg-transparent text-danger dropdown-item" href="user/index.php">Thông tin cá nhân</a>
                    <a class="bg-transparent text-danger dropdown-item" href="login/logout.php">Đăng xuất</a>
                </div>
            </li>
        </ul>


        <!-- Search Bar -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm phim">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                <img src="images/search-icon.png" width="20" height="20" alt="">
            </button>
        </form>
    </div>
</nav>