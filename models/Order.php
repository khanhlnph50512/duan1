<?php

require_once '../Connect/connect.php';

class Order extends connect {
    public function addOrder($product_id,$variant_id,$order_detail_id,$quantity){
        $sql = 'insert into orders(user_id,product_id,variant_id,order_detail_id,quantity,created_at,updated_at)values(?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'],$product_id,$variant_id,$order_detail_id,$quantity]);
    }
    public function addOrderDetail($name,$email,$phone,$address,$amount,$note,$coupon_id,$shipping_id,$payment_method){
        $sql = 'insert into order_details(name,email,phone,address,amount,note,user_id,coupon_id,shipping_id,payment_method,created_at,updated_at) values(?,?,?,?,?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name,$email,$phone,$address,$amount,$note,$_SESSION['user']['user_id'],$coupon_id,$shipping_id,$payment_method]);
    }
    public function getLastInsertId(){
        return $this->connect()->lastInsertId();
    }
    public function getAllOrders(){
        $sql = 'select * from order_details';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function  editStatus(){
        $sql = 'select * from order_details where order_detail_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_Id']]);
           
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateStatus($status){
        $sql = 'update order_details set status =? where order_detail_Id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status,$_GET['order_detail_Id']]);
    }
    public function deleteOrder(){
        $sql = 'detete from order_details where order_detail_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['order_detail_Id']]);
    }
}