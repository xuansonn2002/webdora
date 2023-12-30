<header class="header" id="header">
    <div class="container">
        <div class="logo" id="logo"><a href="index.php"><img src="./public/image/logo/DORA_2_tras.png" alt=""></a></div>
        <nav class="navbar" id="navbar">
            <div class="container">
                <ul>
                    <li class="nav-item"><a href="index.php">Trang chủ</a></li>
                    <li class="nav-item"><a href="#">Giới thiệu</a></li>
                    <li class="nav-item"><a href="category.php">Danh mục</a></li>         
                </ul>
            </div>
        </nav>

        <div class="btn-box">
            <div class="container">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <div class="header-content">
                            <p>Tìm kiếm sản phẩm của bạn</p>
                            <form action="search.php" method="get" class="input">
                                <input type="text" class="my-input" name="search" placeholder="Nhập tên sản phẩm...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li class="user" style="z-index: 10;">
                        <a href="#">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <?php if (isset($_SESSION['email']) && $_SESSION['email'] != "" && $_SESSION['role'] == "admin") { ?>
                            <ul class="nav-second">
                                <a href="#">
                                    <li>
                                        <?php echo $_SESSION['email'] ?>
                                    </li>
                                </a>
                                <a href="admin/index.php">
                                    <li>Quản Lý</li>
                                </a>
                                <a href="logout.php">
                                    <li>Đăng xuất</li>
                                </a>
                            </ul>
                        <?php } else if (isset($_SESSION['email']) && $_SESSION['email'] != "" && $_SESSION['role'] == "user") { ?>
                                <ul class="nav-second">
                                    <a href="#">
                                        <li>
                                        <?php echo $_SESSION['email'] ?>
                                        </li>
                                    </a>
                                    <a href="logout.php">
                                        <li>Đăng xuất</li>
                                    </a>
                                </ul>
                        <?php } else { ?>
                                <ul class="nav-second">
                                    <a href="login.php">
                                        <li>Đăng nhập</li>
                                    </a>
                                    <a href="register.php">
                                        <li>Đăng ký</li>
                                    </a>
                                    
                                </ul>
                        <?php } ?>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-location-dot"></i></a></li>
                </ul>
               
            </div>
        </div>
    </div>
</header>