<?php
include_once './core/db/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['phone']) &&  isset($_POST['address'])) {
        $email = $_SESSION['email'];
        $user = get_by_email_users($email);
        if ($user) {
            $id = $user['id'];
            $orders = array(
                'code' => string_random(5),
                'status' => 'success',
                'users_id' => $id,
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'date' => date('Y-m-d H:i:s'), 
            );
            $_SESSION['order'] = $orders['code'];
            insert_orders($orders);

            $orderId = get_last_inserted_order_id();
            $cart = $_SESSION['cart'];
            for ($i = 0; $i < count($cart); $i++) {
                $orderItems = array(
                    "orders_id" => $orderId,
                    "products_id" => $cart[$i]['productId'],
                    "quantity" => $cart[$i]['quantity'],
                    "price" => $cart[$i]['productPrice'] *  $cart[$i]['quantity'],
                );
                insert_order_items($orderItems);
                $product = get_products( $cart[$i]['productId']);
                $products_id = array(
                    "id" => $cart[$i]['productId'],
                    "image" => $product['image'],
                    "name" => $product['name'],
                    "description" => $product["description"],
                    "price" => $product["price"],
                    "quantity" => $product["quantity"],
                    "category_id" => $product["category_id"],
                    "quantity_sale" =>  (int)$product["quantity"] - (int)$cart[$i]['quantity']
                );
                update_products($products_id);
               
            }
            unset($_SESSION['cart']);

            header('location: order.php');
        }else{
            header('location: login.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once './view/_checkout.php';
}

function string_random($len = 10){
    $keys = array_merge(range(0,9), range('0', '9'));

    $key = "";
    for($i=0; $i < $len; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

function get_last_inserted_order_id() {
    global $pdo; // Biến PDO cần được khai báo ở đây, thay thế bằng biến PDO của bạn
    return $pdo->lastInsertId();
}
