<?php
include_once './core/db/boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id=0;
    $order=null;
    if (isset($_GET['order'])) { //kiểm tra có truyền lọc giá sản phẩm
        $order = $_GET['order'];
    }
    $productList = get_all_products($order);
    if (isset($_GET['id'])) {//kiểm tra có truyền id của category không
        $id = $_GET['id'];
        $productList= get_products_by_category_id((int) $id,$order);
    }
   
    $categoryList = get_all_categories();
    include_once './view/_category.php';
}