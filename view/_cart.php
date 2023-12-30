<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="./public/css/cart.css">
    <link rel="shortcut icon" href="./public/image/logo/favicon.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header design -->
    <?php include_once './view/inc/header.php' ?>

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
                            <span>Giỏ hàng</span>
                        </strong>
                    </li>

                </ul>
            </div>
        </section>
        <section>
            <main class="main_center">
                <div class="main">
                    <div class="cart_main">
                        <div class="hear_cart">
                            <h1>Giỏ hàng của bạn</h1>
                        </div>
                        <div class="">

                            <div class="table_cart">
                                <div class="table_thead">
                                    <div class="table_top">
                                        <div class="info_product">Thông tin sản phẩm</div>
                                        <div class="price">Đơn giá</div>
                                        <div class="quantity">Số lượng</div>
                                        <div class="total">Thành tiền</div>
                                    </div>
                                </div>

                                <?php foreach ($cart as $item) { ?>
                                    <div class="table_cart">
                                        <div class="table_thead">
                                            <div class="table_main">
                                                <div class="container_table">
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="./public/image/products/<?php echo $item['productImage']; ?>"
                                                                alt="">
                                                        </div>
                                                        <div class="info">
                                                            <div class="infoo">
                                                                <div class="name">
                                                                    <?php echo $item['productName']; ?>
                                                                </div>

                                                                <form method="post" action="cart.php">
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    <input type="hidden" name="productId"
                                                                        value="<?php echo $item['productId']; ?>">
                                                                    <button type="submit" class="delete">Xóa</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price_main">
                                                        <?php echo  number_format($item['productPrice'], 0, '', ','); ?>VND
                                                    </div>
                                                    <div class="quantity_main">
                                                        <form class="quantityy" method="post" action="cart.php">
                                                            <input type="hidden" name="_method" value="update">
                                                            <div class="quantity_item">
                                                                <input type="number"
                                                                    value="<?php echo $item['quantity']; ?>" 
                                                                    name="quantityUpdate" >
                                                                    <button class="update" type="submit">update</button>
                                                            </div>
                                                            <input type="hidden" name="productId" 
                                                                value="<?php echo $item['productId']; ?>">

                                                        </form>
                                                    </div>
                                                    <div class="price_main">
                                                        <?php echo number_format($item['quantity'] * $item['productPrice'], 0, '', ','); ?>VND
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="thanhtoan">
                                <div class="container_toan">
                                    <div class="tongtien">
                                        <span>Tổng tiền:</span>
                                        <span>
                                            <?php
                                            $totalPrice = 0;
                                            foreach ($cart as $item) {
                                                $totalPrice += $item['productPrice'] * $item['quantity'];
                                            }
                                            echo number_format($totalPrice, 3);
                                            ?>
                                        </span>
                                    </div>
                                    <div class="buttonthanhtoan">
                                       
                                        <?php  if( isset($_SESSION['user_id'])){?>
                                         <p>Vui lòng đăng nhập <a href="login.php">TẠI ĐÂY</a> để thanh toán!</p>
                                         <?php }else{ ?>
                                            <button><a href="checkout.php">Thanh toán</a></button>
                                            <?php } ?>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
                </div>
            </main>
        </section>

    </div>

    <?php include_once './view/inc/footer.php' ?>

    <!-- button scroll to top design -->
    <button id="toTop"><i class="fa-solid fa-chevron-up"></i></button>

    <script src="./public/js/main.js"></script>
</body>

</html>