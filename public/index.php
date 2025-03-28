<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/CartController.php';

$action  = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();
$productAdmin = new ProductAdminController();
$cartController = new CartController();
switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product':
        $productAdmin->index();
        break;
    case 'product-create':
        $productAdmin->create();
        break;
    case 'product-store':
        $productAdmin->store();
        break;
    case 'product-edit':
        $productAdmin->edit();
        break;
    case 'product-update':
        $productAdmin->update();
        break;
        case 'gallery-delete':
        $productAdmin->deleteGallery();
        break;
        case 'product-variant-delete':
        $productAdmin->deleteProductVariant();
        break;
        case 'product-delete':
        $productAdmin->deleteProduct();
        break;
    case 'category':
        $categoryAdmin->index();
        break;

    case 'category-create':
        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $categoryAdmin->updateCategory();
        break;

    //=======================================================================

    case 'index':
    // Khởi tạo controller để lấy danh sách sản phẩm
    $productAdmin = new ProductAdminController();
    $listProducts = $productAdmin->listProduct(); // Lấy tất cả sản phẩm
    include '../views/client/index.php';
    break;
        case 'product-detail':
            $productAdmin->detail();
        break;
        case 'search':
        $productAdmin->search();
            break;
            case 'cart':
        $cartController->viewCart();
        break;
        case 'add-to-cart':
        $cartController->addToCart();
        break;
    case 'update-cart':
        $cartController->updateCart();
        break;
    case 'remove-from-cart':
        $cartController->removeFromCart();
    case 'login':
        include '../views/client/auth/login.php';
        break;
    case 'register':
        include '../views/client/auth/register.php';
        break;
}
