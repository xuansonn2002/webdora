<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" href="./public/css/buy.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                            <span>Tất cả sản phẩm</span>
                        </strong>
                    </li>
                </ul>
            </div>
        </section>
        <section class="container_category">
            <div class="menu_left">
                <div class="menu">
                    <h3>DANH MỤC SẢN PHẨM</h3>

                    <div><a class="a-href  <?php if($id==0) echo 'active' ?>" href="category.php?id=0"> Tất cả</a></div>
                    <?php foreach ($categoryList as $category) { ?>
                        <?php
                        $href="category.php?id=".$category["id"];
                        if(isset($_GET['order'])){
                            if($_GET['order']=='ASC')
                            $href="category.php?id=".$category["id"]."&order=ASC";
                        elseif($_GET['order']=='DESC' ) 
                        $href="category.php?id=".$category["id"]."&order=DESC";
                        }
                        ?> 
                        <div><a class="a-href <?php if($id==$category["id"]) echo 'active'?>" href="<?php echo $href?>"> <?php echo  $category["name"]?></a></div>
                        <?php }?>
                </div>
                
                
            </div>
            <div class="menu_right">
                <div class="title">
                    <h3>Sản phẩm</h3>
                    <div>
                    <div class="dropdown">
                    <span><b>Sắp xếp :</b>&nbsp 
                    <?php
                    $t='Mặc định';
                    if(isset($_GET['order'])){
                        if($_GET['order']=='ASC')
                            $t= 'Giá tăng dần'; 
                    elseif($_GET['order']=='DESC' ) 
                    $t= 'Giá giảm dần';
                    }
                    echo $t;
                    $idc=null;
                    if(isset($_GET['id'])){
                        $idc='&id='.$_GET['id'];
                        $idd='?id='.$_GET['id'];
                    }
                    ?>  
                <i class='bx bx-chevron-down'></i> </span>
                <div class="dropdown-content">
                <p><a href="category.php<?php echo $idd ?>">Mặc định</a></p>
                <p><a href="category.php?order=ASC<?php echo $idc ?>">Giá tăng dần</a></p>
                <p><a href="category.php?order=DESC<?php echo $idc ?>">Giá Giảm dần</a> </p>
                </div>
                </div>
                   </div>
                </div>
                <div class="product">
                    <div class="swiper-wrapper">
                    <?php foreach ($productList as $item) {  ?>
                        <div class="swiper-slide">
                            <a href="#">
                            <img src="./public/image/products/<?php echo $item['image']?>" alt=""> 
                             </a>
                             <div class="product-info">
                             <a href="#" class="product-name"><?php echo $item['name']?></a>
                                 <div class="price-box">
                                 <span class="price"><?php echo  number_format($item['price'], 0, '', ','); ?>VND</span>
                                   </div>
                             </div>
                             <div class="btn-card">
                             <a href="detail.php?id=<?php echo $item['id']; ?>" class="btn-more" data-product-id="1">Xem chi tiết</a>
                             </div>
                        </div>
                        <?php  } ?> 
                        <?php if (count($productList) == 0) {  ?>
                            <p>Danh sách sản phẩm trống</p>
                            <?php  } ?> 
                    </div>  
                </div>
        </section>
    </div>

    <?php include_once './view/inc/footer.php'?>

    <!-- button scroll to top design -->
    <button id="toTop"><i class="fa-solid fa-chevron-up"></i></button>

    <script src="./public/js/main.js"></script>
</body>
</html>