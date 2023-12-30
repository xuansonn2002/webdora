<?php
require_once '../core/db/boot.php';
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
}
@session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    if(isset($_SESSION['email']) && $_SESSION['email'] != "" && $_SESSION['role'] == "admin") {
        $product_list = get_all_products();
        $order_list =  get_all_order_items ();
        //Tổng doanh thu ngày hiện tại
        $total_today=get_revenue_today()[0]['revenue'];
        $date = getdate();
        //Tổng doanh thu tháng hiện tại
          $total_month=get_revenue_by_month($date['mon'],$date['year']);
        $today= date('Y-m-d');
        $m='';
        for ($i=1; $i < 13; $i++) { 
            //tính tổng doanh thu các tháng trong năm
            $t=get_revenue_by_month($i,$date['year']); //core/db/db_ordẻ_items
            $m .=  $t? $t: '0' ;
            if($i<12)
             $m .= ','; 
        }
        $months=$m;
        include_once './view/statistics/_index.php';
    }
    else{
        if($_SESSION['role'] != "admin")
            $url='http://localhost/dora/index.php';
        else
            $url='http://localhost/dora/login.php';
        header('location:' . $url);
    }
   
}