<?php
include_once './core/db/boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// post: gửi dữ liệu qua form
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
// get: gửi dữ liệu thông qua đường dẫn 
    include_once './view/_order.php';
}
