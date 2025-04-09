<?php
require_once '../models/Coupon.php';

class CouponAdminController  extends Coupon
{
    public function index()
    {
        $listCoupons = $this->listCoupon();
        include "../views/admin/coupon/list.php";
    }
    public function create()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['coupon-create'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên coupon';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập mã coupon';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng coupon';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị coupon';
            }
            if (empty($_POST['start_date'])) {
                $errors['start_date'] = 'Vui lòng nhập ngày bắt đầu';
            }
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = 'Vui lòng nhập ngày kết thúc';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                $_SESSION['errors'] = 'Vui Long nhap day du du lieu';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $coupon = $this->addCoupon(
                $_POST['name'],
                $_POST['coupon_type'],
                $_POST['coupon_code'],
                $_POST['start_date'],
                $_POST['end_date'],
                $_POST['quantity'],
                $_POST['status'],
                $_POST['coupon_value']
            );
            if ($coupon) {
                $_SESSION['success'] = 'Thêm thành công';
                header("Location: ?act=coupon-list");
                exit();
            } else {
                $_SESSION['error'] = 'Thêm mới thất bại, vui lòng thử lại';
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include "../views/admin/coupon/create.php";
    }
    public function edit(){
        $coupon = $this->editCoupon();

        include "../views/admin/coupon/edit.php";
    }
    public function update(){
        if(isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['coupon-update'])){
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên coupon';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập mã coupon';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng coupon';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị coupon';
            }
            if (empty($_POST['start_date'])) {
                $errors['start_date'] = 'Vui lòng nhập ngày bắt đầu';
            }
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = 'Vui lòng nhập ngày kết thúc';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                $_SESSION['errors'] = 'Vui Long nhap day du du lieu';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $updateCoupon = $this->updateCoupon(
                $_POST['name'],
                $_POST['coupon_type'],
                $_POST['coupon_code'],
                $_POST['start_date'],
                $_POST['end_date'],
                $_POST['quantity'],
                $_POST['status'],
                $_POST['coupon_value']
            );
            if($updateCoupon){
                $_SESSION['success'] = 'Cập nhật thành công';
                header("Location:?act=coupon-list");
                exit();
            }else{
                $_SESSION['error'] = 'Cập nhật thất bại, vui lòng thử lại';
                header("Location: ". $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    public function delete(){
        try {
            $this->deleteCoupon();
            $_SESSION['success'] = 'Xóa thành công';
            header('Location:?act=coupon-list');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Xóa thất bại, vui lòng thử lại';
            header("Location: ". $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
