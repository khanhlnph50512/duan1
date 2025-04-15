<!-- views/client/order/my_orders.php -->
<?php include '../views/client/layout/header.php' ?>

<div class="container mt-5 mb-5">
    <h3 class="mb-4">Lịch sử đơn hàng của bạn</h3>

    <?php if (!empty($orders)) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Người nhận</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>PT thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($order['name']) ?></td>
                            <td><?= htmlspecialchars($order['phone']) ?></td>
                            <td><?= htmlspecialchars($order['address']) ?></td>
                            <td><?= number_format(($order['amount'] * 1000), 0, ',', '.') ?>vnd</td>
                            <td><?= ucfirst($order['payment_method']) ?></td>
                            <td>
                                <?php
                                $status = strtolower($order['status']);
                                switch ($status) {
                                    case 'pending':
                                        echo '<span class="badge bg-warning text-dark">Chờ xác nhận</span>';
                                        break;
                                    case 'processing':
                                        echo '<span class="badge bg-info text-dark">Đang xử lý</span>';
                                        break;
                                    case 'completed':
                                        echo '<span class="badge bg-success">Hoàn thành</span>';
                                        break;
                                    case 'canceled':
                                        echo '<span class="badge bg-danger">Đã hủy</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-secondary">Không xác định</span>';
                                        break;
                                }
                                ?>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                            <td>
                                <a href="?act=order-detail&order_detail_Id=<?= $order['order_detail_Id'] ?>">Xem chi tiết</a>

                                <?php if (strtolower($order['status']) === 'pending'): ?>
                                    <a href="?act=order-cancel&order_detail_Id=<?= $order['order_detail_Id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                                        <i class="fa fa-times"></i>
                                    </a>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
    <?php endif; ?>
</div>
<script>
    // Function để kiểm tra trạng thái đơn hàng
    function checkOrderStatus(orderDetailId) {
        $.ajax({
            url: '?act=order-detail&ajax=true&order_detail_Id=' + orderDetailId, // Gọi AJAX để kiểm tra trạng thái
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Đã nhận được phản hồi: ', response); // Kiểm tra phản hồi
                if (response.status) {
                    // Nếu trạng thái đã thay đổi, tự động reload trang
                    location.reload(); 
                }
            },
            error: function() {
                console.log('Lỗi khi gọi Ajax!');
            }
        });
    }

    // Kiểm tra trạng thái đơn hàng sau mỗi 5 giây (5000ms)
    $(document).ready(function() {
        const orderDetailId = <?= $_GET['order_detail_Id'] ?>; // Lấy order_detail_Id từ URL
        setInterval(function() {
            checkOrderStatus(orderDetailId); // Gọi hàm kiểm tra trạng thái
        }, 5000); // Cứ mỗi 5 giây, kiểm tra trạng thái
    });
</script>


<?php include '../views/client/layout/footer.php' ?>