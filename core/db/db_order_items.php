<?php 
require_once 'mysql.php';
$pdo = get_pdo();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function get_all_order_items(){
    global $pdo;

    $sql = "SELECT image,name,order_items.price,date_order, order_items.quantity,order_items.id
    FROM order_items,products
    WHERE order_items.products_id = products.id;";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $order_items_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $order_items = array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'date_order' => $row['date_order']
        );
        array_push($order_items_list, $order_items);
    }
    
    return $order_items_list;
}

function delete_order_items($order_items_id){
    global $pdo;

    $sql = "DELETE FROM ORDER_ITEMS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $order_items_id);

    $stmt->execute();

}

function insert_order_items($order_items){
    global $pdo;
    $sql = "INSERT INTO ORDER_ITEMS(ID, ORDERS_ID, PRODUCTS_ID, QUANTITY , PRICE,DATE_ORDER) VALUES(NULL, :orders_id, :products_id, :quantity, :price,:date_order)";
    $stmt = $pdo->prepare($sql);
    
   
    $stmt->bindParam(':orders_id', $order_items['orders_id']);
    $stmt->bindParam(':products_id', $order_items['products_id']);
    $stmt->bindParam(':quantity', $order_items['quantity']);
    $stmt->bindParam(':price', $order_items['price']);
    $stmt->bindParam(':date_order', date('Y-m-d H:i:s'));
    $stmt->execute();
}
function get_order_items($order_items){
    global $pdo;

    $sql = "SELECT * FROM ORDER_ITEMS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $order_items);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'order_id' => $row['order_id'],
            'product_id' => $row['product_id'],
            'quantity' => $row['quantity'],
            'price' => $row['price']
        );
    }

    return null;
}

function update_order_items($order_items){
    global $pdo;
    $sql = "UPDATE ORDER_ITEMS SET ORDER_ID=:order_id, PRODUCT_ID=:product_id, QUANTITY=:quantity, PRICE=:price WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $order_items['id']);
    $stmt->bindParam(':order_id', $order_items['order_id']);
    $stmt->bindParam(':product_id', $order_items['product_id']);
    $stmt->bindParam(':quantity', $order_items['quantity']);
    $stmt->bindParam(':price', $order_items['price']);
    
    $stmt->execute();
}
function get_all_total(){
    global $pdo;

    $sql = "SELECT SUM(price * quantity) as total
    FROM order_items;";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $orders_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $orders = array(
            'total' => $row['total'],
        );
        array_push($orders_list, $orders);
    }
    
    return $orders_list;
}

function delete_by_order_items($order_id){
    global $pdo;

    $sql = "DELETE FROM ORDER_ITEMS WHERE ORDERS_ID=:orders_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id);

    $stmt->execute();

}
function get_revenue(){
    global $pdo;

    $sql = "SELECT sum(price*quantity) as revenue
    FROM orders,order_items
    WHERE orders.id = order_items.orders_id AND
    status = 'success'
    ;";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $order_items_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $order_items = array(
            'revenue' => $row['revenue']
        );
        array_push($order_items_list, $order_items);
    }
    
    return $order_items_list;
}
function get_revenue_by_month($month,$year){
    global $pdo;
    $sql = "SELECT sum(price) as revenue
    FROM orders,order_items
    WHERE orders.id = order_items.orders_id AND 
    status = 'success' AND MONTH(order_items.date_order) = $month AND YEAR(order_items.date_order) = $year";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $order_items_list = array();

    return $result[0]['revenue'];
}
function get_revenue_today(){
    global $pdo;
    $star= date('Y-m-d 00:00:00');
    $end= date('Y-m-d 23:59:59');
    $sql = "SELECT sum(price) as revenue
    FROM orders,order_items
    WHERE orders.id = order_items.orders_id AND 
    status = 'success' AND  DATE_FORMAT(order_items.date_order, '%Y-%m-%D') = CURDATE()";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $order_items_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $order_items = array(
            'revenue' => $row['revenue']
        );
        array_push($order_items_list, $order_items);
    }
    
    return $order_items_list;
}

?>