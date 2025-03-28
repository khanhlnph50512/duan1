<?php
require_once 'layout/header.php';
?>

<section class="product-detail">
    <div class="container ">
        <div class="row mt-3">

            <div class="col-12 col-md-6">
                <div class="product-detail-gallery">
                    <!-- Hình ảnh chính -->
                    <div class="main-image">
                        <img src="/duan/duan1/public/images/product/<?php echo htmlspecialchars($product['product_image']); ?>"
                            alt="<?php echo htmlspecialchars($product['product_name']); ?>" id="main-image"
                            class="img-fluid small-main-image">
                    </div>
                    <!-- Danh sách ảnh phụ -->
                    <div class="thumbnails mt-3 d-flex gap-2 flex-wrap">
                        <?php if (!empty($product['galleries'])): ?>
                            <?php foreach ($product['galleries'] as $gallery): ?>
                                <img src="/duan/duan1/public/images/product/<?php echo htmlspecialchars($gallery); ?>"
                                    alt="Gallery Image" onclick="changeMainImage(this.src)"
                                    class="img-thumbnail small-thumbnail" style="cursor: pointer;">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
            <div id="cart-message" class="alert" style="display: none;"></div>
                <!-- Thông tin sản phẩm -->
                <div class="product-info">
                    <h1 class="product-title"><?php echo htmlspecialchars($product['product_name']); ?></h1>
                    <div class="product-category mb-2">
                        <span>Danh mục: </span>
                        <a href="#" <?php echo htmlspecialchars($product['category_id']); ?>">
                            <?php echo htmlspecialchars($product['category_name'] ?? 'Chưa có danh mục'); ?>
                        </a>
                    </div>
                    <div class="product-price-wrapper mb-3">
                        <?php if ($product['product_sale_price'] < $product['product_price']): ?>
                            <span
                                class="product-price old-price text-muted text-decoration-line-through"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>
                                VNĐ</span>
                            <span
                                class="product-price new-price text-danger"><?php echo number_format($product['product_sale_price'], 0, ',', '.'); ?>
                                VNĐ</span>
                        <?php else: ?>
                            <span class="product-price"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>
                                VNĐ</span>
                        <?php endif; ?>
                    </div>

                    <form action="?act=add-to-cart" method="POST">
                        <div class="product-variants mb-4">
                            <!-- Chọn màu sắc -->
                            <div class="color-options mb-3">
                                <h4>Chọn màu:</h4>
                                <?php
                                $uniqueColors = [];
                                if (!empty($product['variants'])) {
                                    foreach ($product['variants'] as $variant) {
                                        if (!in_array($variant['variant_color_name'], $uniqueColors)) {
                                            $uniqueColors[] = $variant['variant_color_name'];
                                            ?>
                                            <label class="d-inline-block me-2">
                                                <input type="radio" name="variant_color"
                                                    value="<?php echo htmlspecialchars($variant['variant_color_name']); ?>"
                                                    required>
                                                <span class="color-circle"
                                                    style="background-color: <?php echo htmlspecialchars($variant['variant_color_code']); ?>;"></span>
                                                <span
                                                    class="ms-1"><?php echo htmlspecialchars($variant['variant_color_name']); ?></span>
                                            </label>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo '<p>Không có màu sắc nào để chọn.</p>';
                                }
                                ?>
                            </div>


                            <div class="size-options mb-3">
                                <h4>Chọn kích thước:</h4>
                                <?php
                                $uniqueSizes = [];
                                if (!empty($product['variants'])) {
                                    foreach ($product['variants'] as $variant) {
                                        if (!in_array($variant['variant_size_name'], $uniqueSizes)) {
                                            $uniqueSizes[] = $variant['variant_size_name'];
                                            ?>
                                            <label class="d-inline-block me-2">
                                                <input type="radio" name="variant_size"
                                                    value="<?php echo htmlspecialchars($variant['variant_size_name']); ?>" required>
                                                <span
                                                    class="border p-2"><?php echo htmlspecialchars($variant['variant_size_name']); ?></span>
                                            </label>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo '<p>Không có kích thước nào để chọn.</p>';
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Số lượng -->
                        <div class="quantity-input mb-4 d-flex align-items-center">
                            <h4 class="me-3">Số lượng:</h4>
                            <div class="input-group" style="width: 150px;">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="updateQuantity(-1)">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                    max="<?php echo htmlspecialchars($product['variants'][0]['product_variant_quantity'] ?? 10); ?>"
                                    class="form-control text-center">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="updateQuantity(1)">+</button>
                            </div>
                            <span class="ms-3">(Còn lại:
                                <?php echo htmlspecialchars($product['variants'][0]['product_variant_quantity'] ?? 10); ?>
                                sản phẩm)</span>
                        </div>

                        <!-- Nút thêm vào giỏ hàng -->
                        <form action="?act=add-to-cart" method="POST">
                            <input type="hidden" name="product_id"
                                value="<?php echo htmlspecialchars($product['product_id']); ?>">
                            <button type="submit" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</button>
                        </form>
                </div>
                                

                <div class="product-description mt-4">
                    <h3>Mô tả</h3>
                    <p><?php echo nl2br(htmlspecialchars($product['product_description'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Thay đổi hình ảnh chính
    function changeMainImage(src) {
        document.getElementById('main-image').src = src;
    }

    // Điều chỉnh số lượng
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);
        const maxQuantity = parseInt(quantityInput.max);
        const minQuantity = parseInt(quantityInput.min);

        quantity += change;

        if (quantity < minQuantity) {
            quantity = minQuantity;
        }
        if (quantity > maxQuantity) {
            quantity = maxQuantity;
        }

        quantityInput.value = quantity;
    }
</script>

<?php
require_once 'layout/footer.php'; // Nhúng footer
?>