<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <form action="?act=order-update&order_detail_Id=<?=$orders['order_detail_Id']?>" method="post">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trạng thái đơn hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php 
                                    $currentStatus = $orders['status'];
                                ?>

                                <div class="col-lg-4">
                                    <?php if ($currentStatus == 'Pending'): ?>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="form-check">
                                                 <input class="form-check-input" type="radio" name="status" value="Pending" <?=$orders['status'] == 'Pending' ? 'checked' : ''?> id="flexRadioPending">
                                                 <label class="form-check-label" for="flexRadioPending">
                                                      Chờ xác nhận
                                                 </label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-4">
                                    <?php if ($currentStatus == 'Pending' || $currentStatus == 'Processing'): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="Processing" <?=$orders['status'] == 'Processing' ? 'checked' : ''?> id="flexRadioProcessing">
                                            <label class="form-check-label" for="flexRadioProcessing">
                                                 Đang xử lý
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-4">
                                    <?php if ($currentStatus == 'Processing'): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="Completed" <?=$orders['status'] == 'Completed' ? 'checked' : ''?> id="flexRadioCompleted">
                                            <label class="form-check-label" for="flexRadioCompleted">
                                                 Hoàn thành
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="Canceled" <?=$orders['status'] == 'Canceled' ? 'checked' : ''?> id="flexRadioCanceled">
                                            <label class="form-check-label" for="flexRadioCanceled">
                                                 Thất bại
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Không cho phép chọn gì khi trạng thái là "Hoàn thành" hoặc "Thất bại" -->
                                <div class="col-lg-4">
                                    <?php if ($currentStatus == 'Completed' || $currentStatus == 'Canceled'): ?>
                                        <p>Đơn hàng đã hoàn thành hoặc thất bại, không thể thay đổi trạng thái nữa.</p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <button type="submit" name="order-update" class="btn btn-primary">Cập nhật trạng thái</button>
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
