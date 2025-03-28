<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from html.storebuild.shop/shofy-prv/shofy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Nov 2024 15:12:17 GMT -->

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Shofy - Multipurpose eCommerce HTML Template</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="/duan/duan1/public/client/assets/img/logo/favicon.png">

   <!-- CSS here -->
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/bootstrap.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/animate.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/slick.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/magnific-popup.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/font-awesome-pro.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/flaticon_shofy.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/spacing.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/custom.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <link rel="stylesheet" href="/duan/duan1/public/client/assets/css/main.css">
   </body>
</head>

<body>
   <!-- Thông báo ở góc trên bên phải -->
<div id="notification" class="notification"></div>
   <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


   <!-- pre loader area start -->
   <div id="loading">
      <div id="loading-center">
         <div id="loading-center-absolute">
            <!-- loading content here -->
            <div class="tp-preloader-content">
               <div class="tp-preloader-logo">
                  <div class="tp-preloader-circle">
                     <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                        </circle>
                        <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                     </svg>
                  </div>
                  <img src="/duan/duan1/public/client/assets/img/logo/preloader/preloader-icon.svg" alt="">
               </div>
               <h3 class="tp-preloader-title">Shofy</h3>
               <p class="tp-preloader-subtitle">Loading</p>
            </div>
         </div>
      </div>
   </div>
   <!-- pre loader area end --> <!-- header area start -->
   <header>
      <div class="tp-header-area p-relative z-index-11">
         <!-- header main start -->
         <div class="tp-header-main tp-header-sticky">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-2 col-lg-2 col-md-4 col-6">
                     <div class="logo">
                        <a href="index.php">
                           <img src="/duan/duan1/public/client/assets/img/logo/logo.svg" alt="logo">
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                     <div class="tp-header-search pl-70">
                        <!-- Thanh tìm kiếm -->
                        <div class="tp-header-search pl-70">
                           <form action="?act=search" method="GET" class="search-bar">
                              <div class="input-group">
                                 <input type="hidden" name="act" value="search">
                                 <input type="text" name="keyword" class="form-control"
                                    placeholder="Tìm kiếm sản phẩm..." required>
                                 <button type="submit" class="btn">
                                    <i class="bi bi-search"></i>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-3 col-md-8 col-6">
                     <div class="tp-header-main-right d-flex align-items-center justify-content-end">
                        <div class="tp-header-login d-none d-lg-block">
                           <a href="#" class="d-flex align-items-center">
                              <div class="tp-header-login-icon">
                                 <span>
                                    <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor"
                                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-header-login-content d-none d-xl-block">
                                 <span>Hello, Sign In</span>
                                 <h5 class="tp-header-login-title">Your Account</h5>
                              </div>
                           </a>
                        </div>
                        <div class="tp-header-action d-flex align-items-center ml-50">
                           <div class="tp-header-action-item d-none d-lg-block">
                              <a href="compare.html" class="tp-header-action-btn">
                                 <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor"
                                       stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                              </a>
                           </div>
                           <div class="tp-header-action-item d-none d-lg-block">
                              <a href="wishlist.html" class="tp-header-action-btn">
                                 <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z"
                                       stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501"
                                       stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                 </svg>
                                 <span class="tp-header-action-badge">4</span>
                              </a>
                           </div>
                           <div class="tp-header-action-item">
                           <a href="?act=cart" class="tp-header-action-btn">
                                 <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                       stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path
                                       d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                       stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5"
                                       stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                                 <span class="tp-header-action-badge"><?php echo count($_SESSION['cart'] ?? []); ?></span>
                           </a>
                           </div>
                           <div class="tp-header-action-item d-lg-none">
                              <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                    <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                    <rect x="10" y="14" width="20" height="2" fill="currentColor" />
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
         <div class="tp-header-bottom tp-header-bottom-border d-none d-lg-block" style="background-color: #108EFF ">
            <div class="container">
               <div class="tp-mega-menu-wrapper p-relative">
                  <div class="row align-items-center">
                     <div class="col-xl-6 col-lg-6">
                        <div class="main-menu menu-style-1">
                           <nav class="tp-main-menu-content">
                              <ul>
                                 <li class="has-mega-menu"><a href="index.html" style="color: white;">Home</a></li>
                                 <li class="has-mega-menu ">

                                    <a href="shop.html" style="color: white;">Products</a>
                                    <ul class="tp-submenu tp-mega-menu mega-menu-style-2">
                                       <!-- first col -->
                                       <li class="has-dropdown">
                                          <a href="shop.html" class="mega-menu-title" style="color: white;">Shop
                                             Page</a>
                                          <ul class="tp-submenu">
                                             <li><a href="shop-category.html">Only Categories</a></li>
                                             <li><a href="shop-filter-offcanvas.html">Shop Grid</a></li>
                                             <li><a href="shop.html">Shop Grid with Sideber</a></li>
                                             <li><a href="shop-list.html">Shop List</a></li>
                                             <li><a href="shop-category.html">Categories</a></li>
                                             <li><a href="product-details.html">Product Details</a></li>
                                             <li><a href="product-details-progress.html">Product Details Progress</a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </li>
                                 <li><a href="coupon.html" style="color: white;">Coupons</a></li>
                                 <li class="">
                                    <a href="blog.html" style="color: white;">Blog</a>
                                    <ul class="tp-submenu">
                                       <li><a href="blog.html">Blog Standard</a></li>
                                       <li><a href="blog-grid.html">Blog Grid</a></li>
                                       <li><a href="blog-list.html">Blog List</a></li>
                                       <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                       <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="contact.html" style="color: white;">Contact</a></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-3">
                        <div class="tp-header-contact d-flex align-items-center justify-content-end">
                           <div class="tp-header-contact-icon">
                              <span>
                                 <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M1.96977 3.24859C2.26945 2.75144 3.92158 0.946726 5.09889 1.00121C5.45111 1.03137 5.76246 1.24346 6.01544 1.49057H6.01641C6.59631 2.05874 8.26011 4.203 8.35352 4.65442C8.58411 5.76158 7.26378 6.39979 7.66756 7.5157C8.69698 10.0345 10.4707 11.8081 12.9908 12.8365C14.1058 13.2412 14.7441 11.9219 15.8513 12.1515C16.3028 12.2459 18.4482 13.9086 19.0155 14.4894V14.4894C19.2616 14.7414 19.4757 15.0537 19.5049 15.4059C19.5487 16.6463 17.6319 18.3207 17.2583 18.5347C16.3767 19.1661 15.2267 19.1544 13.8246 18.5026C9.91224 16.8749 3.65985 10.7408 2.00188 6.68096C1.3675 5.2868 1.32469 4.12906 1.96977 3.24859Z"
                                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path d="M12.936 1.23685C16.4432 1.62622 19.2124 4.39253 19.6065 7.89874"
                                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path d="M12.936 4.59337C14.6129 4.92021 15.9231 6.23042 16.2499 7.90726"
                                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                 </svg>
                              </span>
                           </div>
                           <div class="tp-header-contact-content">
                              <h5 style="color: white !important;">Hotline:</h5>
                              <p>
                                 <a href="tel:402-763-282-46" style="color: white !important">+(402) 763 282 46</a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- header area end -->
   </div>