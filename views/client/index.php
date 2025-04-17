<?php include '../views/client/layout/header.php' ?>
<main>


   <!-- product category area start -->

   <section class="tp-product-category pt-60 pb-15">

      <div class="container">

         <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
            <?php foreach ($category as $cate): ?>
               <div class="col">
                  <div class="tp-product-category-item text-center mb-40">
                     <div class="tp-product-category-thumb fix">
                        <a href="?act=category-product&id=<?= $cate['category_id'] ?>">
                           <img src="./images/category/<?= $cate['image'] ?>" width="100px" alt="product-category">
                        </a>
                     </div>
                     <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                           <a >
                              <?= $cate['name'] ?>
                           </a>
                        </h3>

                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>
   <!-- product category area end -->


   <!-- product area start -->
   <section class="tp-product-area pb-55">
      <div class="container">

         <div class="row">
            <div class="col-xl-12">
               <div class="tp-product-tab-content">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                        <div class="row">
                           <?php if (!empty($products)): ?>
                              <?php foreach ($products as $pro): ?>
                                 <div class="col-xl-3 col-lg-3 col-sm-6">
                                    <div class="tp-product-item p-relative transition-3 mb-25">
                                       <div class="tp-product-thumb p-relative fix m-img">
                                          <a href="?act=product_detail&slug=<?= $pro['slug'] ?? $pro['product_slug'] ?>">
                                             <img src="./images/product/<?= $pro['image'] ?? $pro['product_image'] ?>" alt="product-image">
                                          </a>
                                          <div class="tp-product-badge"><span class="product-hot">Hot</span></div>
                                       </div>
                                       <div class="tp-product-content">
                                          <h3 class="tp-product-title"><a href="?act=product_detail&slug=<?= $pro['slug'] ?? $pro['product_slug'] ?>"><?= $pro['name'] ?? $pro['product_name'] ?></a></h3>
                                          <div class="tp-product-rating d-flex align-items-center">
                                             <div class="tp-product-rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                             </div>
                                             <div class="tp-product-rating-text">
                                                <span>(0 Review)</span>
                                             </div>
                                          </div>
                                          <div class="tp-product-price-wrapper">
                                             <span class="tp-product-price old-price"><?= number_format($pro['price'] * 1000, 0, ',', '.') ?>vnd</span>
                                             <span class="tp-product-price new-price"><?= number_format($pro['sale_price'] * 1000, 0, ',', '.') ?>vnd</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                           <?php else: ?>
                              <p>Không có sản phẩm nào.</p>
                           <?php endif; ?>


                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>

      </div>
   </section>
   <!-- product area end -->

   <!-- banner area start -->

   <!-- product banner area end -->

   <!-- product arrival area start -->

   <!-- product arrival area end -->

   <!-- product sm area start -->

   <!-- product sm area end -->

   <!-- blog area start -->

   <!-- blog area end -->

   <!-- instagram area start -->

   <!-- instagram area end -->

   <!-- subscribe area start -->

   <!-- subscribe area end -->



</main>
<?php include '../views/client/layout/footer.php' ?>