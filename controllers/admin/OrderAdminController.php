<?php
require_once '../helpers/helpers.php';

require_once '../models/Order.php';

class OrderAdminController extends Order{
   public function index(){
    checkAdminAccess(); // Kiểm tra quyền admin trước khi tiếp tục

    $getOrderById = $this->getAllOrders();

    include '../views/admin/order/list.php';
   } 
   public function edit(){
    checkAdminAccess();

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
 public function show() {
    checkAdminAccess();

    // Kiểm tra nếu có id đơn hàng được gửi đến
    $order_detail_id = $_GET['order_detail_Id'] ?? null;

    if (!$order_detail_id) {
        $_SESSION['error'] = 'Không tìm thấy đơn hàng';
        header("Location: ?act=order_status");
        exit();
    }

    // Lấy thông tin chi tiết đơn hàng
    $orderDetail = $this->getOrderDetailById($order_detail_id);
    $orderItems = $this->getOrderItems($order_detail_id); // Lấy các sản phẩm trong đơn hàng

    include '../views/admin/order/order_detail.php';  // Truyền dữ liệu vào view
}
}