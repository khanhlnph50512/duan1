<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
$action  = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();

switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product';
        include '../views/admin/product/list.php';
        break;
    case 'product-create';
        include '../views/admin/category/create.php';
        break;
    case 'product-edit';
        include '../views/admin/category/edit.php';
        break;
    case 'category';
    $categoryAdmin->index();
            break;

    case 'category-create';
    $categoryAdmin->addCategory();
        break;
    case 'category-edit';
    $categoryAdmin->updateCategory();
        break;
    //=======================================================================

    case 'index';
        include '../views/client/index.php';
        break;
        case 'login';
        include '../views/client/auth/login.php';
        break;
        case 'register';
        include '../views/client/auth/register.php';
        break;
}
