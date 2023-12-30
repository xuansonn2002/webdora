<?php 
require_once 'mysql.php';
$pdo = get_pdo();
$pdo1 = get_pdo();
function get_all_products($order=null){
    global $pdo;
// lấy tất cả các sản phẩm
    $sql = "SELECT * FROM PRODUCTS";
    if($order !=null){
        $sql = "SELECT * FROM PRODUCTS ORDER BY PRICE $order";
    }
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $products_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $products= array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id'],
            'quantity_sale' => $row['quantity_sale'],
        );
        array_push($products_list, $products);
    }
    
    return $products_list;
}


function delete_products($products_id){
    global $pdo;

    $sql = "DELETE FROM PRODUCTS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $products_id);

    $stmt->execute();

}

function insert_products($products){
    global $pdo;
    $sql = "INSERT INTO PRODUCTS(ID, IMAGE, NAME, DESCRIPTION, PRICE, QUANTITY , CATEGORY_ID) VALUES(NULL, :image, :name, :description, :price, :quantity, :category_id)";
    $stmt = $pdo->prepare($sql);
    
   
    $stmt->bindParam(':image', $products['image']);
    $stmt->bindParam(':name', $products['name']);
    $stmt->bindParam(':description', $products['description']);
    $stmt->bindParam(':price', $products['price']);
    $stmt->bindParam(':quantity', $products['quantity']);
    $stmt->bindParam(':category_id', $products['category_id']);
    // chèn dữ liệu vào mysql
    $stmt->execute();
}
    function get_products($products){
        global $pdo;
        // lấy 1 sản phẩm theo id
        $sql = "SELECT * FROM PRODUCTS WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $products);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        
        
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id'],
            'quantity_sale' => $row['quantity_sale'],
        );
    }

    return null;
}
function get_products_by_category_id($id,$order=null){
    global $pdo; // lấy danh sách sản phẩm theo category_id

    $sql = "SELECT * FROM PRODUCTS WHERE CATEGORY_ID=:id";
    if($order !=null){
        $sql = "SELECT * FROM PRODUCTS WHERE CATEGORY_ID=:id ORDER BY PRICE $order";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id); 
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $products_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $products= array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id'],
            'quantity_sale' => $row['quantity_sale'],
        );
        array_push($products_list, $products);
    }
    
    return $products_list;
}

function update_products($products){
    global $pdo;
    $sql = "UPDATE PRODUCTS SET IMAGE=:image, NAME=:name,DESCRIPTION=:description, PRICE=:price, QUANTITY=:quantity,CATEGORY_ID=:category_id, QUANTITY_SALE=:quantity_sale WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    //global khai báo biến toàn cục
    $stmt->bindParam(':id', $products['id']);
    $stmt->bindParam(':image', $products['image']);
    $stmt->bindParam(':name', $products['name']);
    $stmt->bindParam(':description', $products['description']);
    $stmt->bindParam(':price', $products['price']);
    $stmt->bindParam(':quantity', $products['quantity']);
    $stmt->bindParam(':category_id', $products['category_id']);
    $stmt->bindParam(':quantity_sale', $products['quantity_sale']);
    
    $stmt->execute();
}

function get_all_by_products(){
    global $pdo;

    $sql = "SELECT sum(quantity) as quantity
    FROM products;";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $products_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $products= array(       
            'quantity' => $row['quantity'],    
        );
        array_push($products_list, $products);
    }
    
    return $products_list;
}
function get_search_products($search){
    global $pdo;

    $sql = "SELECT * FROM products WHERE name LIKE :search";
    $stmt = $pdo->prepare($sql);

    // Sử dụng bindValue thay vì bindParam để tránh lỗi
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    return $result;
}
function search_product($nameProduct)
{
    global $pdo;
    $sql = "SELECT * FROM PRODUCTS  WHERE NAME LIKE :name";
    $stmt = $pdo->prepare($sql);
    $nameProductSearch = '%' . $nameProduct . '%';
    $stmt->bindParam(':name', $nameProductSearch);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả và xây dựng mảng tên sản phẩm
    $names = array();
    foreach ($result as $row) {
        $names[] = $row['name'];
    }

    return $names;
}
?>
