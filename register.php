<?php
include_once './core/db/boot.php';
$arr = array(
    'error' => '',
    'name' => '',
    'email' => '',
    'phone' => '',
    'password' => '',
);
// mảng tông tin đăng kí
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkUser = get_all_users();
    //gán biến để gọi hàm
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
        $userArr = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
            'role' => 'user',
        );

        $isUserListEmail = false;
        $isUserListPhone = false;
        foreach ($checkUser as $userList) {
            if ($userList['email'] == $_POST['email']) {
                $isUserListEmail = true;
            }
            if ($userList['phone'] == $_POST['phone']) {
                $isUserListPhone = true;
            }
        }
        if (!$isUserListEmail && !$isUserListPhone) {
            insert_users($userArr);
            header('location: login.php');
        } else {
            if ($isUserListEmail && $isUserListPhone) {
                $arr['error'] = 'Email và số điện thoại đã tồn tại';
                $arr['name'] = $_POST['name'];
                $arr['email'] = $_POST['email'];
                $arr['phone'] = $_POST['phone'];
                $arr['password'] = $_POST['password'];
                include_once './view/_register.php';
            } else {
                if ($isUserListEmail && !$isUserListPhone) {
                    $arr['error'] = 'Email đã tồn tại';
                    $arr['name'] = $userArr['name'];
                    $arr['email'] = $userArr['email'];
                    $arr['phone'] = $userArr['phone'];
                    $arr['password'] = $userArr['password'];
                    include_once './view/_register.php';
                } else {
                    $arr['error'] = 'Số điện thoại đã tồn tại';
                    $arr['name'] = $userArr['name'];
                    $arr['email'] = $userArr['email'];
                    $arr['phone'] = $userArr['phone'];
                    $arr['password'] = $userArr['password'];
                    include_once './view/_register.php';
                }
            }

        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once './view/_register.php';
}
