<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="shortcut icon" href="./public/image/logo/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- header design -->
    <?php include_once './view/inc/header.php'?>

    <div class="bodywrap">
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="home.php">Trang chủ</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                    </li>
                    <li class="intro">
                        <strong>
                            <span>Đăng nhập tài khoản</span>
                        </strong>
                    </li>
                </ul>
            </div>
        </section>

        <section class="section">
            <form action="login.php" method="post" class="container">
                <div class="wpx">
                    <ul class="menu-list">
                        <li class="login"><a href="#">Đăng nhập</a></li>
                        <li><a href="register.php">Đăng ký</a></li>
                    </ul>

                    <h1 class="title-head">Đăng nhập</h1>
                    <?php if (isset($error_message) && !empty($error_message)): ?>
                    <div class="mess">Sai email hoặc mật khẩu !</div>
                    <?php endif; ?>
                    <div class="field">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Mật khẩu" name="password">
                    </div>

                    <button type="submit">Đăng nhập</button>

                    <a href="#">Quên mật khẩu</a>

                    <div class="block-social-login">
                        <p>Hoặc đăng nhập bằng</p>
                        <div class="img-login">
                            <a href="#"><img src="./public/image/icon/fb-btn.svg" alt=""></a>
                            <a href="#"><img src="./public/image/icon/gp-btn.svg" alt=""></a>  
                        </div>
                    </div>
                    
                </div>
            </form>
        </section>
    </div>

    <?php include_once './view/inc/footer.php'?>
    <script src="./public/js/main.js"></script>
</body>
</html>