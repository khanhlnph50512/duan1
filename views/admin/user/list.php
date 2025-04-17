<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

     <!-- Start Container Fluid -->
     <div class="container-xxl">

          <div class="card overflow-hiddenCoupons">
               <div class="card-body p-0">
                    <div class="table-responsive">
                         <table class="table align-middle mb-0 table-hover table-centered">
                              <thead class="bg-light-subtle">
                                   <tr>
                                        <th>Id</th>
                                        <th>Tên người dùng</th>
                                        <th>Địa chỉ </th>
                                        <th>Email</th>
                                        <th>vai trò</th>
                                        <th>Số điện thoại</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($ListUsers as $user): ?>
                                        <tr>
                                             <td><?= $user['user_id'] ?></td>

                                             <td> <span class="badge bg-light-subtle text-muted border py-1 px-2"><?= $user['name'] ?></span> </td>


                                             <td> <span class="badge bg-light-subtle text-muted border py-1 px-2"><?= $user['address'] ?></span> </td>
                                             <td>
                                                  <span class="badge bg-light-subtle text-muted border py-1 px-2"><?= $user['email'] ?></span>
                                             </td>
                                             <td>
                                                  <span class="badge bg-light-subtle text-muted border py-1 px-2">
                                                       <?= $user['role_id'] == 2 ? 'Admin' : 'User' ?>
                                                  </span>
                                             </td>
                                             <td>
                                                  <span class="badge bg-light-subtle text-muted border py-1 px-2"><?= $user['phone'] ?></span>

                                             </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="?act=edit-role&user_id=<?= $user['user_id'] ?>" class="btn btn-sm btn-warning">Sửa vai trò</a>
                                                  </div>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    </div>
                    <!-- end table-responsive -->
               </div>
               <div class="row g-0 align-items-center justify-content-between text-center text-sm-start p-3 border-top">
                    <div class="col-sm">
                         <div class="text-muted">
                              Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">59</span> Results
                         </div>
                    </div>
                    <div class="col-sm-auto mt-3 mt-sm-0">
                         <ul class="pagination  m-0">
                              <li class="page-item">
                                   <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                              </li>
                              <li class="page-item active">
                                   <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item">
                                   <a href="#" class="page-link">2</a>
                              </li>
                              <li class="page-item">
                                   <a href="#" class="page-link">3</a>
                              </li>
                              <li class="page-item">
                                   <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                              </li>
                         </ul>
                    </div>
               </div>
          </div> <!-- end card -->

     </div>
     <!-- End Container Fluid -->

     <!-- ========== Footer Start ========== -->
     <footer class="footer">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12 text-center">
                         <script>
                              document.write(new Date().getFullYear())
                         </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                              href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
               </div>
          </div>
     </footer>
     <!-- ========== Footer End ========== -->

</div>
<?php include '../views/admin/layout/footer.php' ?>