<?php
include 'layout/header.php';
?>
<section class="section-product py-5">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Áo thun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Áo thun FIDE LABUBU</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Image Gallery -->
            <div class="col-12 col-lg-6">
                <div class="box-img">
                    <img class="w-100 main-product-image"
                        src="https://product.hstatic.net/200000863757/product/z5594338311706_53123b2d888f84bf37ea7ce2c1371724_c360165a807e4baa8a89f5df76784e4c.jpg"
                        alt="Áo Sơ Mi Nam Trắng Aristino">

                    <!-- Thumbnail Gallery -->
                    <div class="product-thumbnails mt-3 d-flex justify-content-start">
                        <div class="thumbnail mr-2">
                            <img src="https://product.hstatic.net/200000863757/product/z5594338311706_53123b2d888f84bf37ea7ce2c1371724_c360165a807e4baa8a89f5df76784e4c.jpg"
                                alt="Thumbnail 1" class="img-thumbnail">
                        </div>
                        <div class="thumbnail mr-2">
                            <img src="https://product.hstatic.net/200000863757/product/z5594338311706_53123b2d888f84bf37ea7ce2c1371724_c360165a807e4baa8a89f5df76784e4c.jpg"
                                alt="Thumbnail 2" class="img-thumbnail">
                        </div>
                        <div class="thumbnail mr-2">
                            <img src="https://product.hstatic.net/200000863757/product/z5594338311706_53123b2d888f84bf37ea7ce2c1371724_c360165a807e4baa8a89f5df76784e4c.jpg"
                                alt="Thumbnail 3" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-12 col-lg-6">
                <div class="product-info">
                    <h1 class="title-product mb-3">Áo thun FIDE LABUBU phông unisex form rộng</h1>

                    <!-- Product Rating -->
                    <div class="product-rating mb-3">
                        <div class="stars text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text ml-2">(4.5/5) · 256 đánh giá</span>
                    </div>

                    <!-- Product Price -->
                    <div class="product-price mb-3">
                        <span class="current-price text-danger font-weight-bold">169,000đ</span>
                        <span class="original-price text-muted ml-2 text-decoration-line-through">199,000đ</span>
                    </div>

                    <!-- Color Selection -->
                    <div class="color-selection mb-3">
                        <label class="d-block mb-2">Màu sắc</label>
                        <div class="color-options d-flex">
                            <div class="color-item mr-2 border rounded-circle"
                                style="background-color: white; width: 30px; height: 30px;"></div>
                            <div class="color-item mr-2 border rounded-circle"
                                style="background-color: gray; width: 30px; height: 30px;"></div>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div class="size-selection mb-3">
                        <label class="d-block mb-2">Chọn size</label>
                        <div class="size-options">
                            <input type="radio" class="btn-check" name="size" id="sizeS" autocomplete="off">
                            <label class="btn btn-outline-secondary mr-2" for="sizeS">S</label>

                            <input type="radio" class="btn-check" name="size" id="sizeM" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary mr-2" for="sizeM">M</label>

                            <input type="radio" class="btn-check" name="size" id="sizeL" autocomplete="off">
                            <label class="btn btn-outline-secondary mr-2" for="sizeL">L</label>

                            <input type="radio" class="btn-check" name="size" id="sizeXL" autocomplete="off">
                            <label class="btn btn-outline-secondary mr-2" for="sizeXL">XL</label>

                            <input type="radio" class="btn-check" name="size" id="sizeXXL" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sizeXXL">XXL</label>
                        </div>
                    </div>


                    <!-- Quantity and Add to Cart -->
                    <div class="purchase-actions mb-3">
                        <div class="quantity-control d-flex align-items-center mr-3" style="max-width: 120px;">
                            <button class="btn btn-outline-secondary btn-sm minus-btn"
                                style="padding: 2px 6px; height: 30px;">-</button>
                            <input type="number" class="form-control form-control-sm text-center mx-2" value="1" min="1"
                                max="10" style="width: 50px; padding: 2px; height: 30px;">
                            <button class="btn btn-outline-secondary btn-sm plus-btn"
                                style="padding: 2px 6px; height: 30px;">+</button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg mt-3">
                        <i class="fas fa-shopping-cart mr-2"></i>Thêm vào giỏ hàng
                    </button>
                </div>

                <!-- Shipping and Return Info -->
                <div class="shipping-info text-muted small mt-3">
                    <p>Thời gian giao hàng: Từ 3 đến 5 ngày kể từ ngày đặt</p>
                    <p>Đổi hàng trong 30 ngày với sản phẩm còn nguyên tem, nhãn</p>
                </div>
            </div>
        </div>

        <!-- Product Description and Details -->
        <div class="col-12 mt-5">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description" type="button" role="tab">Mô tả sản phẩm</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment"
                        type="button" role="tab">Đánh giá</button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="productTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <p>Áo thun FIDE LABUBU phông unisex form rộng local brand nam nữ cổ tròn oversize - AT79</p>
                    <p>Chất liệu: Cotton 2 chiều</p>
                    <p>️Bo cổ : 3 phân không bị giãn hay nhão sau khi giặt</p>
                    <p>️Thiết kế nhiều phong cách đa dạng khác nhau : streetwear , dễ thương, cá tính , mạnh mẽ, ngầu ,
                        năng đông, hiện thời , thiết mới luôn theo xu hướng trend</p>
                    <p>️ Áo có 5 SIZE : S M L XL XXL</p>
                </div>
                <div class="tab-pane fade" id="comment" role="tabpanel">
                    <h5>Đánh giá sản phẩm</h5>
                    <form id="reviewForm">
                        <div class="form-group">
                            <label for="username">Tên của bạn</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Chọn số sao</label>
                            <select class="form-control" id="rating" name="rating">
                                <option value="5">⭐⭐⭐⭐⭐ (5 sao)</option>
                                <option value="4">⭐⭐⭐⭐ (4 sao)</option>
                                <option value="3">⭐⭐⭐ (3 sao)</option>
                                <option value="2">⭐⭐ (2 sao)</option>
                                <option value="1">⭐ (1 sao)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Nội dung đánh giá</label>
                            <textarea class="form-control" id="commentText" name="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Gửi đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php
include 'layout/footer.php';
?>