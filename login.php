<?php
include_once './core/db/boot.php';
@session_start();
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = get_by_email_users($email);    
        $check_login = false;
       
        
            if ($user && ($user['password'] == $password)) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['users_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $check_login = true;
            }
        

        if ($check_login) {
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart']) && $_SESSION['isCheck']) {
                header('Location: checkout.php');
            } else {
                header('Location: index.php');
                $error_message = '';
            }
        } else {
            $check_login = false;
            $error_message = 'Sai email hoặc mật khẩu ! ';
            include_once './view/_login.php';
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['email']) && $_SESSION['email'] != "") {
        header('Location: checkout.php');
    } else {
        include_once './view/_login.php';
    }
   
}
