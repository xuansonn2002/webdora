<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin Dora</title>
    <link rel="shortcut icon" href="../../../public/media/img/logo.png" type="image/x-icon">
    <link href="../public/admin/css/style.css" rel="stylesheet" />
    <script src="../public/admin/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once './view/inc/_navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once './view/inc/_sideleft.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 ">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="/dora/admin"> Dashboard</a></li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Biểu đồ doanh thu trong năm
                                </div>
                                <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Doanh thu
                                </div>
                                <div class="card-body">
                                <h4>Doanh thu hôm nay: <b><?php echo   number_format($total_today, 0, '', ','); ?> </b>VND </h4>
                                <h4>Doanh thu tháng này: <b> <?php echo   number_format($total_month , 0, '', ','); ?></b> VND </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Thống kê hàng tồn kho
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng còn lại</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng còn lại</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $index = 0; ?>
                                    <?php foreach ($product_list as $product) { ?>
                                        <tr>
                                            <td><?php echo ++$index; ?></td>
                                            <td><img src="http://localhost/dora/public/image/products/<?php echo $product['image']; ?>" width="60" height="60"></td>
                                            <td><?php echo $product['name']; ?></td> 
                                            <td><?php echo $product['price']; ?></td>
                                            <td><?php echo $product['quantity_sale']; ?></td>
                                               </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
         
          
        </div>
    </div>
    <!-- Tải thư viện Chart.js từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../public/admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/admin/js/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../public/admin/js/scripts.js"></script>
    <script src="../public/admin/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
    <script src="../public/admin/js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script>
  const ctx = document.getElementById('myChart');
  var myData = "<?php echo $months; ?>"

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    datasets: [{
      label: 'VND',
      data: myData.split(','), //chuyển đổi chuỗi thành mảng
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
    </script>
</body>

</html>