<?php include '../views/client/layout/header.php' ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow mx-auto" style="max-width: 700px;">
        <div class="card-header text-center bg-primary text-white">
            <h4>Chi tiết đơn hàng</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-4">
                <tr>
                    <th>Mã đơn hàng</th>
                    <td><?= $orderDetail['order_detail_Id'] ?></td>
                </tr>
                <tr>
                    <th>Họ tên</th>
                    <td><?= $orderDetail['name'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $orderDetail['email'] ?></td>
                </tr>
                <tr>
                    <th>Điện thoại</th>
                    <td><?= $orderDetail['phone'] ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><?= $orderDetail['address'] ?></td>
                </tr>
                <tr>
                    <th>Ghi chú</th>
                    <td><?= $orderDetail['note'] ?: 'Không có' ?></td>
                </tr>
                <tr>
                    <th>Phương thức thanh toán</th>
                    <td><?= $orderDetail['payment_method'] ?></td>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <td><?= number_format($orderDetail['amount']) ?> đ</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td><?= $orderDetail['status'] ?></td>
                </tr>
                <tr>
                    <th>Ngày đặt</th>
                    <td><?= $orderDetail['created_at'] ?></td>
                </tr>
            </table>

            <div class="text-center no-print">
                <a href="?act=my-orders" class="btn btn-secondary ms-2">← Quay lại</a>
            </div>
        </div>
    </div>
</div>
<h5 class="text-center mt-5">Danh sách sản phẩm</h5>
<table class="table table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orderItems as $item): 
            $price = $item['sale_price'] ?? $item['price'];
            $total = $price * $item['quantity'];
        ?>
        <tr>
            <td><img src="./images/product/<?= $item['image'] ?>" width="60" height="60" style="object-fit:cover;"></td>
            <td><?= $item['product_name'] ?></td>
            <td><?= $item['color_name'] ?? 'Không có' ?></td>
            <td><?= $item['size_name'] ?? 'Không có' ?></td>
            <td><?= number_format($price) ?> đ</td>
            <td><?= $item['quantity'] ?></td>
            <td><?= number_format($total) ?> đ</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
<?php include '../views/client/layout/footer.php' ?>
