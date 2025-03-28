<?php
require_once 'layout/header.php';
?>

<section class="cart-section">
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>
        <?php if (empty($cartItems)): ?>
            <p>Giỏ hàng trống.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cartItems as $key => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><img src="/duan/duan1/public/images/product/<?php echo htmlspecialchars($item['image']); ?>"
                                    alt="" width="50"></td>
                            <td><?php echo htmlspecialchars($item['product_name']); ?> <br>
                                (<?php echo htmlspecialchars($item['variant_color'] . ' - ' . $item['variant_size']); ?>)</td>
                            <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
                            <td>
                                <form action="?act=update-cart" method="POST" class="d-inline">
                                    <input type="hidden" name="key" value="<?php echo htmlspecialchars($key); ?>">
                                    <div class="input-group" style="width: 150px;">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="this.parentNode.querySelector('input').value++; this.form.submit();">+</button>
                                        <input type="number" name="quantity"
                                            value="<?php echo htmlspecialchars($item['quantity'] ?? 1); ?>" min="1"
                                            class="form-control text-center" style="width: 50px;" onchange="this.form.submit()">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="this.parentNode.querySelector('input').value--; this.form.submit();">-</button>

                                    </div>
                                </form>
                            </td>
                            <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</td>
                            <td>
                                <a href="?act=remove-from-cart&key=<?php echo htmlspecialchars($key); ?>"
                                    class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-end mt-3 mb-3">
                <a href="?act=checkout" class="btn btn-primary">Thanh toán</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
require_once 'layout/footer.php';
?>