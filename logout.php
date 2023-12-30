<?php 
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['cart']);
unset($_SESSION['role']);
// xóa tất cả thông tin login
header('Location: login.php');
?>