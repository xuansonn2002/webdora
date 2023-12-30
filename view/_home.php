<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang chủ</title>
        <link rel="stylesheet" href="./public/css/home.css">
        <link rel="shortcut icon" href="./public/image/logo/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!-- header design -->
        <?php include_once './view/inc/header.php' ?>

     
<div class="banner">
<img src="./public/image/banner/bia1.jpg" alt="">
</div>

        <!-- section products design -->
        <section class="menu_mid" id="menu_mid">
            <div class="container">
                
                <div class="card-box row">
                    <?php foreach ($productList as $key => $item) { if($key<10) { //$key<10 hiển thị dưới 10 sản phẩm?>
                 
                        <div class="col-md-4 col-6 ">
                        <div class="item">
                            <a href="#">
                                <img src="./public/image/products/<?php echo $item['image'] ?>" alt="">
                            </a>
                            <div class="product-info">
                                <a href="#" class="product-name"><?php echo $item['name'] ?></a>
                                <div class="price-box">
                                    <span class="price"><?= number_format($item['price'], 0, '', ',') ?>VND </span>
                                  
                                </div>
                            </div>
                            <div class="btn-card">
                                <a href="detail.php?id=<?php echo $item['id']; ?>" class="btn-more" data-product-id="1">Xem chi tiết</a>
                            </div>
                        </div>
                        </div>
                    <?php  }} ?>
                </div>
            </div>
        </section>

 
  

        <?php include_once './view/inc/footer.php' ?>

        <!-- button scroll to top design -->
        <button id="toTop"><i class="fa-solid fa-chevron-up"></i></button>

        <script src="public/js/main.js"></script>
    </body>

    </html>