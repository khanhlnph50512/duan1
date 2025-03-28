<?php
include 'layout/header.php';
?>

<div class="container my-5">
    <h2>Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($_GET['keyword']); ?>"</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-warning">
            <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
        <div class="row">
            <?php if (!empty($searchResults)): ?>
                <?php foreach ($searchResults as $product): ?>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="tp-product-item p-relative transition-3 mb-25">
                            <div class="product-thumb">
                                <a href="?act=product-detail&slug=<?php echo htmlspecialchars($product['product_slug']); ?>">
                                    <img
                                        src="/duan/duan1/public/images/product/<?php echo htmlspecialchars($product['product_image']); ?>"
                                        alt="<?php echo htmlspecialchars($product['product_name']); ?>"
                                        class="small-product-image"> <!-- Thêm class để thu nhỏ ảnh -->
                                </a>
                                <!-- Product badge -->
                                <?php if ($product['product_sale_price'] < $product['product_price']): ?>
                                    <div class="tp-product-badge">
                                        <span class="product-hot">Sale</span>
                                    </div>
                                <?php endif; ?>
                                <!-- Product action -->
                                <div class="tp-product-action">
                                    <div class="tp-product-action-item d-flex flex-column">
                                        <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="tp-product-tooltip">Add to Cart</span>
                                        </button>
                                        <button type="button" class="tp-product-action-btn tp-product-quick-view-btn"
                                            data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="tp-product-tooltip">Quick View</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-product-content">
                                <div class="tp-product-category">
                                    <a href="#"><?php echo htmlspecialchars($product['category_name'] ?? 'Chưa có danh mục'); ?></a>
                                </div>
                                <h3 class="tp-product-title">
                                    <a href="?act=product-detail&slug=<?php echo htmlspecialchars($product['product_slug']); ?>">
                                        <?php echo htmlspecialchars($product['product_name']); ?>
                                    </a>
                                </h3>
                                <div class="tp-product-rating d-flex align-items-center">
                                    <div class="tp-product-rating-icon">
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                        <span><i class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="tp-product-rating-text">
                                        <span>(5 Review)</span>
                                    </div>
                                </div>
                                <div class="tp-product-price-wrapper">
                                    <?php if ($product['product_sale_price'] < $product['product_price']): ?>
                                        <span class="tp-product-price old-price"><?php echo number_format($product['product_price'], 0, ',', '.'); ?> VNĐ</span>
                                        <span class="tp-product-price new-price"><?php echo number_format($product['product_sale_price'], 0, ',', '.'); ?> VNĐ</span>
                                    <?php else: ?>
                                        <span class="tp-product-price"><?php echo number_format($product['product_price'], 0, ',', '.'); ?> VNĐ</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'layout/footer.php';?>