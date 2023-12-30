<?php
require_once '../../core/db/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_name=null;
    if(isset($_FILES['image'])){
        $uploads_dir = '/uploads';
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
         
        $expensions= array("jpeg","jpg","png");
         
        if(in_array($file_ext,$expensions)=== false){
           $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
         
        if($file_size > 2097152) {
           $errors[]='Kích thước file không được lớn hơn 2MB';
        }
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"./uploads/".$file_name);
          // echo "Success";
        }
     }
    $createProduct = array(
        "name" => $_POST['name'],
        "image" => $file_name?$file_name:$_POST['image'],
        "description" => $_POST["description"],
        "price" => $_POST["price"],
        "quantity" => $_POST["quantity"],
        "category_id" => $_POST["category_id"],
        "quantity_sale" =>0
    );
    insert_products($createProduct);

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_list = get_all_categories();
    include_once '../view/products/_create.php';
}