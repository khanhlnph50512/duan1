<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/OrderAdminController.php';
/////////////////////////
require_once '../controllers/client/HomeController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';
require_once '../controllers/client/OrderController.php';

$action  = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$couponAdmin = new CouponAdminController();
$orderAdmin = new OrderAdminController();
///////////////////////////
$home = new HomeController();
$auth = new AuthController();
$profile = new ProfileController();
$cart  = new CartController();
$order = new OrderController();
if (isset($_GET['act']) && $_GET['act'] === 'order-detail' && isset($_GET['ajax']) && isset($_GET['order_detail_Id'])) {
    require_once '../models/Order.php'; // Vẫn giữ tên class là Order
    $order = new Order(); // Khởi tạo đối tượng của class Order
    $orderDetails = $order->editStatus(); // Sử dụng phương thức editStatus để lấy trạng thái đơn hàng
    echo json_encode(['status' => $orderDetails['status']]); // Trả về trạng thái đơn hàng
    exit;
}
switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product';
        $productAdmin->index();
        break;
    case 'product-create';
        $productAdmin->create();
        break;
    case 'product-store';
        $productAdmin->store();
        break;
    case 'product-edit';
        $productAdmin->edit();
        break;
    case 'product-update';
        $productAdmin->update();
        break;
    case 'gallery-delete';
        $productAdmin->deleteGallery();
        break;
    case 'product-variant-delete';
        $productAdmin->deleteProductVariant();
        break;
    case 'product-delete';
        $productAdmin->deleteProduct();
        break;
    case 'category';
        $categoryAdmin->index();
        break;

    case 'category-create';
        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $categoryAdmin->updateCategory();
        break;
    case 'coupon-list':
        $couponAdmin->index();
        break;
    case 'coupon-create':
        $couponAdmin->create();
        break;
    case 'coupon-edit':
        $couponAdmin->edit();
        break;
    case 'coupon-update':
        $couponAdmin->update();
        break;
    case 'coupon-delete':
        $couponAdmin->delete();
        break;
    case 'order_status':
        $orderAdmin->index();
        break;
    case 'order-edit':
        $orderAdmin->edit();
        break;
    case 'order-update':
        $orderAdmin->update();
        break;
    case 'order-delete':
        $orderAdmin->delete();
        break;
    case 'orderAdmin-detail':
        $orderAdmin->show();
        break;

    //=======================================================================

    case 'index':
        $home->index();
        break;
    case 'register':
        $auth->registers();
        break;
    case 'login':
        $auth->signin();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'profile':
        include "../views/client/profile/profile.php";
        break;
    case 'update-profile':
        $profile->updateProfile();
        break;
    case 'product_detail':
        $home->productDetail();
        break;
    case 'cart':
        $cart->index();
        break;
    case 'update-cart':
        $cart->update();
        break;
    case 'delete-cart':
        $cart->delete();
        break;
    case 'addToCart-buyNow':
        $cart->addToCartOrByNow();
        break;
    case 'remove_coupon':
        $cart->removeCoupon();
        break;
    case 'checkout':
        $order->index();
        break;
    case 'order':
        $order->checkout();
        break;
    case 'my-orders':
        $order->myOrders();
        break;

    case 'order-cancel':
        $order->cancel();
        break;
    case 'order-detail':
        $order->orderDetail();
        break;
    case 'category-product':
        $home->categoryProduct();
        break;
}
