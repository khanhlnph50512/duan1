<?php include '../views/admin/layout/header.php' ?>

<div class="container my-5">
    <h2 class="text-center">Chi tiết đơn hàng</h2>

    <!-- Thông tin đơn hàng -->
    <div class="card p-4 mb-4">
        <h3 class="text-primary">Thông tin người nhận</h3>
        <p><strong>Tên:</strong> <?php echo $orderDetail['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $orderDetail['email']; ?></p>
        <p><strong>Điện thoại:</strong> <?php echo $orderDetail['phone']; ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo $orderDetail['address']; ?></p>
        <p><strong>Số tiền:</strong> <?php echo number_format($orderDetail['amount']); ?> VND</p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo $orderDetail['payment_method']; ?></p>
        <p><strong>Trạng thái:</strong> <?php echo $orderDetail['status']; ?></p>
    </div>

    <!-- Danh sách sản phẩm trong đơn hàng -->
    <div class="card p-4">
        <h3 class="text-primary">Sản phẩm trong đơn hàng</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Màu sắc</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $item) { ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td>
                            <img src="./images/product/<?= $item['image'] ?>" class="img-fluid" width="60" height="60" style="object-fit:cover;">
                        </td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($item['sale_price'] * $item['quantity']); ?> VND</td>
                        <td><?php echo $item['color_name']; ?></td>
                        <td><?php echo $item['size_name']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Thêm các tùy chọn như "Cập nhật trạng thái", "Hủy đơn hàng" -->
    <div class="text-center mt-4">
        <a href="?act=order_status" class="btn btn-warning btn-lg">Trở lại</a>
        <!-- Thêm các nút cập nhật trạng thái hay hủy đơn hàng tùy vào yêu cầu -->
    </div>
</div>

<?php include '../views/admin/layout/footer.php' ?>
