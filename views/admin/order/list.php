<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

                    <!-- Start Container Fluid -->
                    <div class="container-xxl">

                     

                         <div class="row">
                              <div class="col-xl-12">
                                   <div class="card">
                                        <div class="d-flex card-header justify-content-between align-items-center">
                                             <div>
                                                  <h4 class="card-title">All Order List</h4>
                                             </div>
                                             
                                        </div>
                                        <div class="card-body p-0">
                                             <div class="table-responsive">
                                                  <table class="table align-middle mb-0 table-hover table-centered">
                                                       <thead class="bg-light-subtle">
                                                            <tr>
                                                                 <th>Order ID</th>
                                                                 <th>Created at</th>
                                                                 <th>Customer</th>
                                                                 <th>Total</th>
                                                                 <th>Payment Status</th>
                                                                 <th>Order Status</th>
                                                                 <th>Action</th>
                                                                 
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                        <?php foreach($getOrderById as $order) :?>
                                                            <tr>
                                                                 <td>
                                                                      <?=$order['order_detail_Id']?>
                                                                 </td>
                                                                 <td><?=$order['created_at']?></td>
                                                                 <td>
                                                                 <?=$order['name']?>                                                                 </td>
                                                                 <td> <span class="badge border border-secondary text-secondary  px-2 py-1 fs-13"> <?=$order['payment_method']?>  </span></td>

                                                                 <td> <span class="badge border border-secondary text-secondary  px-2 py-1 fs-13"> <?=$order['status']?>  </span></td>
                                                                  <!-- Form để cập nhật trạng thái -->
                                                        

                                                                 <td>
                                                                      <div class="d-flex gap-2">
                                                                           <a href="?act=order-edit&order_detail_Id=<?=$order['order_detail_Id']?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                           <a  onclick="return confirm('Bạn chắc chắn muốn xóa')" href="?act=order-delete&order_detail_Id=<?=$order['order_detail_Id']?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>

                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                         <?php endforeach;?>
                                                            
                                                            


                                                       </tbody>
                                                  </table>
                                             </div>
                                             <!-- end table-responsive -->
                                        </div>
                                        <div class="card-footer border-top">
                                             <nav aria-label="Page navigation example">
                                                  <ul class="pagination justify-content-end mb-0">
                                                       <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                                       <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                       <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                       <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                       <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                                  </ul>
                                             </nav>
                                        </div>
                                   </div>
                              </div>

                         </div>

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
<?php include '../views/admin/layout/footer.php' ?>