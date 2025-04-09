<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

            <!-- Start Container Fluid -->
            <div class="container-xxl">
                     <form action="?act=order-update&&order_detail_Id=<?=$orders['order_detail_Id']?>" method="post">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trạng thái đơn hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="form-check">
                                             <input class="form-check-input" type="radio" name="status" value="Pending"<?=$orders['status'] == 'Pending' ? 'checked' : ''?> id="flexRadioDefault9" checked="">
                                             <label class="form-check-label" for="flexRadioDefault9">
                                                  Chờ xác nhận
                                             </label>
                                        </div>
                                        
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Processing"<?=$orders['status'] == 'Processing' ? 'checked' : ''?> id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                             Đang xử lý
                                        </label>
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Completed"<?=$orders['status'] == 'Completed' ? 'checked' : ''?> id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                             Hoàn thành
                                        </label>
                                   </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Canceled"<?=$orders['status'] == 'Canceled' ? 'checked' : ''?> id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                            Thất bại
                                        </label>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                            <button  type="submit" name="order-update" class="btn btn-primary">Cập nhật mã giảm giá</button>
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