<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="./public/css/buy.css">
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
                        <a href="home.html">Trang chủ</a>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                    </li>
                    <li class="intro">
                        <strong>
                            <span>Chi tiết sản phẩm</span>
                        </strong>
                    </li>
                </ul>
            </div>
        </section>

        <section class="product-layout menu-right">
            <div class="container">
                <div class="row">
                    <?php foreach ($productList as $product) { ?>
                        <?php if ($product['id'] == $_GET['id']) { ?>
                            <div class="buy">
                                <div class="img-product" id="product-image">
                                    <img src="./public/image/products/<?php echo $product['image']; ?>" alt="">
                                </div>
                                <div class="order">
                                    <h1 class="title-product" id="product-name">
                                        <?php echo $product['name'] ?>
                                    </h1>
                                    <div class="price-box">
                                        <span class="special-price" id="product-price">
                                            <?php echo number_format($product['price'], 0, '', ','); ?> VND
                                        </span>
                                        
                                    </div>
                                    <form action="cart.php" method="post" class="clearfix form-group">
                                        <input type="hidden" name="_method" value="create">
                                        <label class="sl section">Số lượng</label>
                                        <div class="add remove muahang">
                                            <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                                            <input type="hidden" name="productName" value="<?php echo $product['name']; ?>">
                                            <input type="hidden" name="productImage" value="<?php echo $product['image']; ?>">
                                            <input type="hidden" name="productPrice" value="<?php echo $product['price']; ?>">
                                           
                                            <input type="number" style="width: 60px; font-size: 15px; margin: 0px" value="1" name="quantity">
                                           
                                        </div>
                                        <div class="btn-box">
                                            <button class="orange" type="submit">thêm vào giỏ hàng</button>
                                          
                                           </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <ul class="tabs">
                        <li class="tab-link active">
                            <h3>mô tả sản phẩm</h3>
                        </li>
                        <li class="tab-link">
                            <h3>chính sách</h3>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <p id="description">
                        <?php echo $product['description']; ?>
                        </p>
                        
                    </div>

                


                </div>

            </div>
            <div class="container">
                <div class="productRelate">
                    <div class="title-index">
                        <h2><a href="#">Sản phẩm gợi ý</a></h2>
                    </div>
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                            <div class="swiper-slide">
                                <a href="#">
                                    <img src="./public/image/products/<?php echo $productList[$i]['image'] ?>"
                                        alt="">
                                </a>
                                <div class="product-info">
                                    <a href="#" class="product-name">
                                        <?php echo $productList[$i]['name'] ?>
                                    </a>
                                    <div class="price-box">
                                        <span class="price">
                                            <?php echo  number_format($productList[$i]['price'], 0, '', ','); ?> VND
                                        </span>
                                        <!-- <span class="compare-price">70.000đ</span> -->
                                    </div>
                                </div>
                                <div class="btn-card">
                                    <a href="detail.php?id=<?php echo $productList[$i]['id']; ?>" class="btn-more">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once './view/inc/footer.php' ?>

    <!-- button scroll to top design -->
    <button id="toTop"><i class="fa-solid fa-chevron-up"></i></button>

    <script src="./public/js/main.js"></script>
</body>

</html>