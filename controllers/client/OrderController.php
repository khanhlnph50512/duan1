<?php
require_once '../models/Cart.php';
require_once '../models/Ship.php';
require_once '../models/User.php';
require_once '../models/Order.php';

class OrderController {
    protected $cart;
    protected $ship;
    protected $user;
    protected $order;

    public function __construct(){
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->order = new Order();
    }
    public function index(){
        $user = $this->user->getUserById($_SESSION['user']['user_id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();

        include "../views/client/checkout/checkout.php";
    }
    public function checkout(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])){
            $carts = $this->cart->getAllCart();

            $orderDetail = $this->order->addOrderDetail(
                 $_POST['name'],
                 $_POST['email'],
                 $_POST['phone'],
                 $_POST['address'],
                 $_POST['amount'],
                 $_POST['note'],
                 $_POST['coupon_id'],
                 $_POST['shipping_id'],
                $_POST['payment_method']
            );
            if($orderDetail){
                $orderDetail_id = $this->order->getLastInsertId();
                foreach($carts as $cart){
                  $this->order->addOrder($cart['product_id'],$cart['variant_id'],$orderDetail_id,$cart['cart_quantity']);
                  $this->cart->deleteCart($cart['cart_id']);
                }
                unset($_SESSION['total']);
                unset($_SESSION['coupon']);
                unset($_SESSION['totalCoupon']);
                header("Location:?act=index");
                $_SESSION['success'] = 'dat hang thanh cong';
                exit();
            }else{
                $_SESSION['error'] = 'Dat hang that bai, vui long thu lai';
                header("Location:?act=checkout ");
                exit();
            }
        }
    }
}