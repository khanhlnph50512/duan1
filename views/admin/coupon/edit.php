<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

            <!-- Start Container Fluid -->
            <div class="container-xxl">
                     <form action="?act=coupon-update&&coupon_Id=<?=$coupon['coupon_Id']?>" method="post">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trạng thái mã giảm giá</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="form-check">
                                             <input class="form-check-input" type="radio" name="status" value="Hidden"<?=$coupon['status'] == 'Hidden' ? 'checked' : ''?> id="flexRadioDefault9" checked="">
                                             <label class="form-check-label" for="flexRadioDefault9">
                                                  Đã hết hạn
                                             </label>
                                        </div>
                                        
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Active"<?=$coupon['status'] == 'Active' ? 'checked' : ''?> id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                             Đang hoạt động
                                        </label>
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Future Plan" id="flexRadioDefault11">
                                        <label class="form-check-label" for="flexRadioDefault11">
                                            Kế hoạch tương lai
                                        </label>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lịch trình</h4>
                        </div>
                        <div class="card-body">
                          
                                <div class="mb-3">
                                     <label for="start-date" class="form-label text-dark">Ngày bắt đầu</label>
                                     <input type="text" id="start-date" class="form-control flatpickr-input active" name="start_date" value="<?=$coupon['start_date']?>"placeholder="yyyy-mm-dd" >
                                </div>
                                <?php if (isset($_SESSION['errors']['start_date'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['start_date'] ?></p>
                                   <?php endif; ?>
                        
                                <div class="mb-3">
                                     <label for="end-date" class="form-label text-dark">Ngày kêt thúc</label>
                                     <input type="text" id="end-date" class="form-control flatpickr-input active" name="end_date" value="<?=$coupon['end_date']?>"placeholder="yyyy-mm-dd" >
                                </div>
                                <?php if (isset($_SESSION['errors']['end_date'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['end_date'] ?></p>
                                   <?php endif; ?>
                           
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin mã giảm giá</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="coupons-code" class="form-label">Tên mã giảm giá</label>
                                        <input type="text" id="coupons-code" name="name"value="<?=$coupon['name']?>" class="form-control" placeholder="Code enter">
                                   </div>
                                   <?php if (isset($_SESSION['errors']['name'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                   <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                <div class="mb-3">
                                        <label for="product-categories" class="form-label">Mã giảm</label>
                                        <input type="text" id="coupons-limits" name="coupon_code"value="<?=$coupon['coupon_code']?>" class="form-control" placeholder="Ten ma giam gia">
                                        </div>
                                        <?php if (isset($_SESSION['errors']['coupon_code'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_code'] ?></p>
                                   <?php endif; ?>
                                </div>
                                
                               
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="coupons-limits" class="form-label">Số lượng</label>
                                        <input type="number" id="coupons-limits" name="quantity"value="<?=$coupon['quantity']?>" class="form-control" placeholder="Nhập số lượng">
                                   </div>
                                </div>
                                <?php if (isset($_SESSION['errors']['quantity'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['quantity'] ?></p>
                                   <?php endif; ?>
                            </div>
                            <h4 class="card-title mb-3 mt-2">Các loại phiếu giảm giá</h4>
                            <div class="row mb-3">
                                <!-- <div class="col-lg-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="form-check">
                                             <input class="form-check-input" type="radio" name="coupon_type" value="Free Shipping" id="flexRadioDefault12" checked="">
                                             <label class="form-check-label" for="flexRadioDefault12">
                                                Miễn phí vận chuyển
                                             </label>
                                        </div>
                                        
                                   </div>
                                </div> -->
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_type" <?=$coupon['coupon_type'] == 'Pencentage' ? 'checked' : ''?> value="Pencentage" id="flexRadioDefault13">
                                        <label class="form-check-label" for="flexRadioDefault13">
                                            Giảm theo phần trăm
                                        </label>
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_type"<?=$coupon['coupon_type'] == 'Fixed Amout' ? 'checked' : ''?> value="Fixed Amout"id="flexRadioDefault14">
                                        <label class="form-check-label" for="flexRadioDefault14">
                                            Số tiền cố định
                                        </label>
                                   </div>
                                </div>
                                <?php if (isset($_SESSION['errors']['coupon_type'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_type'] ?></p>
                                   <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <label for="discount-value" class="form-label">Giá trị giảm</label>
                                        <input type="text" id="discount-value" name="coupon_value" value="<?=$coupon['coupon_value']?>" class="form-control" placeholder="Nhập giá trị">
                                   </div>
                                   <?php if (isset($_SESSION['errors']['coupon_value'])): ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_value'] ?></p>
                                   <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top">
                            <button  type="submit" name="coupon-update" class="btn btn-primary">Cập nhật mã giảm giá</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            </div>
            <!-- End Container Fluid -->

            <!-- ========== Footer Start ========== -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>document.write(new Date().getFullYear())</script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                                href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">Techzaa</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- ========== Footer End ========== -->

        </div>
<?php 
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php' ?>