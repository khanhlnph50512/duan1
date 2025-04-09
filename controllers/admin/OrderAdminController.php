<?php
require_once '../models/Order.php';

class OrderAdminController extends Order{
   public function index(){
    $getOrderById = $this->getAllOrders();

    include '../views/admin/order/list.php';
   } 
   public function edit(){
    $orders = $this->editStatus();

    include '../views/admin/order/edit.php';
   }
   public function update()
   {
       if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['order-update'])) {


           $updateStatus = $this->updateStatus(
               $_POST['status'],
           );

           if ($updateStatus) {
               $_SESSION['success'] = 'Thêm mã giảm giá thành công';
               header("Location: ?act=order_status");
               exit();
           } else {
               $_SESSION["error"] = "Thêm mã giảm giá thất bại";
               header("Location:" . $_SERVER['HTTP_REFERER']);
               exit();
           }
       }

   }

   public function delete() {
       try{
         $this->deleteOrder();
         $_SESSION['success'] = 'Xóa đơn hàng thành công';
         header('Location: ?act=order_status');
         exit();
       }catch(\Throwable $th){
        $_SESSION['error'] = 'Xóa đơn hàng không thành công';
        header("Location:" . $_SERVER['HTTP_REFERER']);
        exit();
       }
 }
}