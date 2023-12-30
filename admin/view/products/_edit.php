<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="shortcut icon" href="../../public/img/logo/123.png" type="image/x-icon">
    <link href="../../public/admin/css/style.css" rel="stylesheet" />
    <script src="../../public/admin/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once '../view/inc/_navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once '../view/inc/_sideleft.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <form action="edit.php" method="post"  enctype = "multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="<?php echo $product['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="image" value="<?php echo $product['image']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" name="description" value="<?php echo $product['description']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" name="price" value="<?php echo $product['price']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quantity</label>
                                    <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category_id</label>
                                    <select name="category_id" class="form-control">
                                        <?php foreach ($category_list as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"
                                        <?php echo $category['id']==$product['category_id'] ?  'selected' : ''; ?>
                                        ><?php echo $category['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../public/admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../public/admin/js/scripts.js"></script>
    <script src="../../public/admin/js/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="../../public/admin/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
    <script src="../../public/admin/js/datatables-simple-demo.js"></script>
</body>

</html>