<?php
require_once '../models/Cart.php';
class CartController extends Cart {
    public function index(){
        $carts = $this->getAllCart();
        $sum = 0;
        foreach($carts as $cart){
            $sum += $cart['product_variant_sale_price'] * $cart['cart_quantity'];
        //     echo '<pre>';
        //    print_r($sum);
        //     echo '<pre>';
        }
        $_SESSION['total'] = $sum;


        include "../views/client/cart/cart.php";
    }
    public function addToCartOrByNow(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])){

            // echo '<pre>';
            // print_r($_POST);
            // echo '<pre>';
           if(empty($_POST['variant_id'] )){
            $_SESSION['error'] = 'Vui lòng chọn màu săc và kích thước sản phẩm';
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
          
           }
           $productQuantity = $this->getQuantity($_POST['product_id'], $_POST['variant_id']);

           if(!$productQuantity) {
               $_SESSION['error'] = 'Sản phẩm không tồn tại hoặc đã hết hàng';
               header('Location:'.$_SERVER['HTTP_REFERER']);
               exit();
           }
           $checkCart = $this->checkCart();
           $newQuantity = $_POST['quantity'];

           if($checkCart) {
               $newQuantity += $checkCart['quantity']; // Cộng dồn số lượng nếu đã có trong giỏ
           }
   
           // Nếu số lượng vượt quá kho, báo lỗi
           if ($newQuantity > $productQuantity) {
               $_SESSION['error'] = 'Số lượng đặt hàng vượt quá số lượng tồn kho!';
               header('Location:'.$_SERVER['HTTP_REFERER']);
               exit();
           }
           if($checkCart){
            $quantity = $checkCart['quantity'] + $_POST['quantity'];
            $updateCart = $this->updateCart($_SESSION['user']['user_id'],$_POST['product_id'],$_POST['variant_id'],$quantity);
            
             $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
             header('Location:'.$_SERVER['HTTP_REFERER']);
          exit();
           }else{
            $addToCart = $this->addToCart(
                $_SESSION['user']['user_id'],
                $_POST['product_id'],
                $_POST['variant_id'],
                $_POST['quantity']);
             $_SESSION['success'] = 'Thêm vào gio hàng thành công';
             header('Location:'.$_SERVER['HTTP_REFERER']);
             exit();
           }
        }else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_now'])){
            if(empty($_POST['variant_id'] )){
                $_SESSION['error'] = 'Vui lòng chọn màu săc và kích thước sản phẩm';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
              
               }
            $checkCart = $this->checkCart();
           if($checkCart){
            $quantity = $checkCart['quantity'] + $_POST['quantity'];
            $updateCart = $this->updateCart($_SESSION['user']['user_id'],$_POST['product_id'],$_POST['variant_id'],$quantity);
            
            //  $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
             header('Location:?act=cart');
          exit();
           }else{
            $addToCart = $this->addToCart(
                $_SESSION['user']['user_id'],
                $_POST['product_id'],
                $_POST['variant_id'],
                $_POST['quantity']);
            //  $_SESSION['success'] = 'Thêm vào gio hàng thành công';
             header('Location:?act=cart');
                          exit();
           }
        }
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])){
         if(isset($_POST['quantity'])){
            foreach($_POST['quantity'] as $cart_id => $quantity){
                $this->updateCartById($cart_id,$quantity);

            }
            header('Location:?act=cart');
            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
            exit();
         }
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply_coupon'])){
          $coupon =   $this -> getCouponByCode($_POST['coupon_code']);
               if(!$coupon){
                $_SESSION['error'] = 'Mã giảm giá không tồn tại';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
               }
               if(isset($_SESSION['coupon'])){
                $_SESSION['error'] = 'Chỉ được sử dụng 1 mã giảm giá cho 1 đơn hàng';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
               }
            
               if($coupon){
                $_SESSION['coupon'] = $coupon;
               
                $totalCoupon = $this->handleCoupon($coupon,$_SESSION['total']);
                $_SESSION['totalCoupon'] = $totalCoupon;
            //     echo'<pre>';
            //  print_r($totalCoupon);
            //     echo'<pre>';
             
                $_SESSION['success'] = 'Áp dụng mã giảm giá thành công';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
               }
        }
    }
    public function delete(){
       try{
        $this->deleteCart($_GET['cart_Id']);
        $_SESSION['success'] = 'xóa danh mục thành công';
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit();
       }catch(\Throwable $th){
        $_SESSION['error'] = 'xóa danh mục thất bại.vui lòng thử lại';
        header('Location'.$_SERVER['HTTP_REFERER']);
        exit();
       }
    }

    public function handleCoupon($coupon,$total){
        
        if($coupon['coupon_type']=='Pencentage'){
            
            $totalCoupon = ($total * ($coupon['coupon_value'] / 100));
           
        }elseif($coupon['coupon_type']=='Fixed Amout'){
           $totalCoupon = $coupon['coupon_value'];
           
        }
       
        
        return $totalCoupon;
      
    }
}