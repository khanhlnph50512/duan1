<?php include '../views/client/layout/header.php' ?>
<main>

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Checkout</h3>
                        <div class="breadcrumb__list">
                           <span><a href="http://localhost/DU_AN_1%20NHOM3/public/">Trang chủ</a></span>
                           <span>Thanh toán</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- checkout area start -->
          <form action="?act=order" method="post">
         <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
               <div class="row">
                 
                  <div class="col-lg-7">
                     <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">Thông tin thanh toán</h3>

                        <div class="tp-checkout-bill-form">
                           
                              <div class="tp-checkout-bill-inner">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>Họ và tên <span>*</span></label>
                                          <input type="text" name="name" value="<?= $user['name']?>" placeholder="First Name">
                                       </div>
                                    </div>
                                    
                                   
                                    
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Địa chỉ</label>
                                          <input type="text" name="address" value="<?= $user['address']?>" placeholder="House number and street name">
                                       </div>

                                      
                                    </div>
                                    
                                   
                                   
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Số điện thoại <span>*</span></label>
                                          <input type="text" name="phone" value="<?= $user['phone']?>" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Email <span>*</span></label>
                                          <input type="email" name="email" value="<?= $user['email']?>" placeholder="">
                                       </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Ghi chú</label>
                                          <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <!-- checkout place order -->
                     <div class="tp-checkout-place white-bg">
                        <h3 class="tp-checkout-place-title">Đơn hàng của bạn</h3>

                        <div class="tp-order-info-list">
                           <ul>

                              <!-- header -->
                              <li class="tp-order-info-list-header">
                                 <h4>Sản phẩm</h4>
                                 <h4>Thành tiền</h4>
                              </li>

                              <!-- item list -->
                               <?php foreach($carts as $cart) : ?>
                              <li class="tp-order-info-list-desc">
                                 <p><?=$cart['product_name']?> <span> x <?=$cart['cart_quantity']?></span></p>
                                 <span><?=number_format($cart['product_variant_sale_price'] * 1000)?></span>
                              </li>
                              <?php endforeach; ?>
                             

                              <!-- subtotal -->
                              <li class="tp-order-info-list-subtotal">
                                 <span>Tổng tiền</span>
                                 <input type="hidden" name="amount" value="<?= $_SESSION['total']?>">
                                 <span><?=number_format($_SESSION['total'] * 1000)?>vnd</span>
                              </li>
                              <?php if(isset($_SESSION['coupon'])) :?>
                              <li class="tp-order-info-list-subtotal">
                                <input type="hidden" name="coupon_id" value="<?=$_SESSION['coupon']['coupon_Id']?>">
                                 <span>Mã giảm giá</span>
                                 <span>-<?=number_format($_SESSION['totalCoupon'] * 1000)?>vnd</span>
                              </li>

                              <?php endif; ?>

                              <!-- shipping -->
                              <li class="tp-order-info-list-shipping">
                                 <span>Phương thức vận chuyển</span>
                                 <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                 <?php foreach($ships as $key => $ship): ?>
   
                                 <span>
                                       <input id="flat_rate-<?=$key+1?>" type="radio" name="shipping_id" value="<?=$ship['ship_Id']?>">
                                       <label for="flat_rate-<?=$key+1?>"><?=$ship['shipping_name']?> <span><?=number_format($ship['shipping_prices'])?>vnd</span></label>
                                    </span>
                                    <?php endforeach; ?>

                                 </div>
                              </li>

                              <!-- total -->
                               <?php if(isset($_SESSION['coupon'])) :?>
                              <li class="tp-order-info-list-total">
                                 <span>Total</span>
                                 <span><?=number_format(($_SESSION['total'] - $_SESSION['totalCoupon']) * 1000)?></span>
                              </li>
                              <?php else :?>
                                <li class="tp-order-info-list-total">
                                 <span>Total</span>
                                 <span><?=number_format($_SESSION['total'] * 1000)?></span>
                              </li>
                              <?php endif;?>
                           </ul>
                        </div>
                        <div class="tp-checkout-payment">
                           <div class="tp-checkout-payment-item">
                              <input type="radio" id="back_transfer" name="payment">
                              <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                              <div class="tp-checkout-payment-desc direct-bank-transfer">
                                 <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                              </div>
                           </div>
                           <div class="tp-checkout-payment-item">
                              <input type="radio" id="cheque_payment" name="payment">
                              <label for="cheque_payment">Cheque Payment</label>
                              <div class="tp-checkout-payment-desc cheque-payment">
                                 <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                              </div>
                           </div>
                           <div class="tp-checkout-payment-item">
                              <input type="radio" id="cod" name="payment_method" value="cod">
                              <label for="cod">Thanh toán cod</label>
                              <div class="tp-checkout-payment-desc cash-on-delivery">
                                 <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                              </div>
                           </div>
                           <div class="tp-checkout-payment-item paypal-payment">
                              <input type="radio" id="paypal" name="payment">
                              <label for="paypal">PayPal <img src="client/assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                           </div>
                        </div>
                        <div class="tp-checkout-agree">
                           <div class="tp-checkout-option">
                              <input id="read_all" type="checkbox">
                              <label for="read_all">I have read and agree to the website.</label>
                           </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                           <button type="submit" name="checkout" class="tp-checkout-btn w-100">Thanh toán</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         </form>
         <!-- checkout area end -->


      </main>
<?php include '../views/client/layout/footer.php' ?>