<?php
include_once './core/db/boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $productList = get_all_products();
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $GLOBALS['productSearch'] = search_product($search);
    }

    include_once './view/_search.php';
}
