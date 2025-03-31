<!doctype html>
<html class="no-js" lang="zxx">
   
<!-- Mirrored from html.storebuild.shop/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Nov 2024 15:12:17 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>WEB </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="public\client\assets\img\logo\1.jpg">

      <!-- CSS here -->
      <link rel="stylesheet" href="client/assets/css/bootstrap.css">
      <link rel="stylesheet" href="client/assets/css/animate.css">
      <link rel="stylesheet" href="client/assets/css/swiper-bundle.css">
      <link rel="stylesheet" href="client/assets/css/slick.css">
      <link rel="stylesheet" href="client/assets/css/magnific-popup.css">
      <link rel="stylesheet" href="client/assets/css/font-awesome-pro.css">
      <link rel="stylesheet" href="client/assets/css/flaticon_shofy.css">
      <link rel="stylesheet" href="client/assets/css/spacing.css">
      <link rel="stylesheet" href="client/assets/css/main.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <!-- toast js -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
   </head>
   <body>
   <?php
       if(isset($_SESSION['error'])){
          echo"<script type='text/javascript'>
          toastr.warning('{$_SESSION['error']}');
          </script>";

          // xoa errorr tranh lap lai
          unset($_SESSION['error']);
       }

       if(isset($_SESSION['success'])){
          echo"<script type='text/javascript'>
          toastr.success('{$_SESSION['success']}');
          </script>";

          // xoa errorr tranh lap lai
          unset($_SESSION['success']);
       }
       ?>

     


      




      

      <!-- header area start -->
      <header>
         <div class="tp-header-area p-relative z-index-11">
   <!-- header main start -->
            <div class="tp-header-main tp-header-sticky">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                        <div class="logo">
                           <a href="index.php">
                              <img src="client/assets/img/logo/1.jpg" alt="logo" height= "80px" >
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                        <div class="tp-header-search pl-70">
                           
                        </div>
                         <div class="col-xl-12 col-lg-7 d-none d-lg-block">
                        <div class="tp-header-search pl-70">
                           <form action="?act=index">
                              <div class="tp-header-search-wrapper d-flex align-items-center">
                                 <div class="tp-header-search-box">
                                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">

                                 </div>
                                 <div class="tp-header-search-category">
                                 
                                    <select>
                                       <?php foreach($category as $cate) : ?>
                                       <option value="<?= $cate['category_id'] ?>" <?= isset($_GET['category_id']) && $_GET['category_id'] == $cate['category_id'] ? 'selected' : '' ?>><?=$cate['name']?></option>
                                       <?php endforeach; ?>
                                    </select>
                                    
                                 </div>
                                 <div class="tp-header-search-btn">
                                    <button type="submit">
                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M19 19L14.65 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     </div>
                     <div class="col-xl-4 col-lg-3 col-md-8 col-6">
                        <div class="tp-header-main-right d-flex align-items-center justify-content-end">
                           <?php if(!isset($_SESSION['user'])):?>
                        <div class="tp-header-login d-none d-lg-block">
                              <a href="?act=login" class="d-flex align-items-center">
                                 <div class="tp-header-login-icon">
                                    <span>
                                       <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                       
                                    </span>
                                 </div>
                                 <div class="tp-header-login-content d-none d-xl-block">
                                    <span>Đăng nhập</span>
                                    <h5 class="tp-header-login-title">Tài khoản của bạn</h5>
                                 </div>
                              </a>
                           </div>
                           <?php else:?>
                              <a href="?act=profile" class="d-flex align-items-center">
                                 <div class="tp-header-login-icon">
                                    <span>
                                       <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                       
                                    </span>
                                 </div>
<div class="tp-header-login-content d-none d-xl-block">
                                    <span>Xin chào,<?=$_SESSION['user']['name']?></span>
                                    <!-- <h5 class="tp-header-login-title">Your Account</h5> -->
                                 </div>
                              </a>
                              <?php endif;?>
                           <div class="tp-header-action d-flex align-items-center ml-50">
                              
                             
                              <div class="tp-header-action-item">
                                 <!-- <a href="?act=cart" type="button" class="tp-header-action-btn cartmini-open-btn"> -->
                                 <a href="?act=cart" type="button" >

                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>    
                                                                                           
                                 </a>
                              </div>
                              <div class="tp-header-action-item d-lg-none">
                                 <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                       <rect x="10" width="20" height="2" fill="currentColor"/>
                                       <rect x="5" y="7" width="25" height="2" fill="currentColor"/>
                                       <rect x="10" y="14" width="20" height="2" fill="currentColor"/>
                                    </svg>
                                 </button>
                              </div>
                              
                           </div>
</div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- header bottom start -->
            <div class="tp-header-bottom tp-header-bottom-border d-none d-lg-block">
               <div class="container">
                  <div class="tp-mega-menu-wrapper p-relative">
                     <div class="row align-items-center">
                     
                         
                        <!-- <div class="col-xl-6 col-lg-6">
                           <div class="main-menu menu-style-1">
                              <nav class="tp-main-menu-content">
                                 <ul>
                                    <li class="has-dropdown has-mega-menu">
                                       <a href="index.php">Trang chủ</a>
                                    </li>
                                    <li  class="has-dropdown has-mega-menu">
                                       <a href="shop.html">Sản phẩm</a>
                                   </li>
                                  
                                    <li class="has-dropdown">
                                       <a href="blog.html">Bài viết</a>
                                    </li>
                                    <li><a href="contact.html">Liên hệ</a></li>
                                 </ul>
                              </nav>
                           </div>
                        </div> -->
                       
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->