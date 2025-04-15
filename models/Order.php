<?php

require_once '../Connect/connect.php';

class Order extends connect
{
    public function addOrder($product_id, $variant_id, $order_detail_id, $quantity)
    {
        $sql = 'insert into orders(user_id,product_id,variant_id,order_detail_id,quantity,created_at,updated_at)values(?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'], $product_id, $variant_id, $order_detail_id, $quantity]);
    }
    public function addOrderDetail($name, $email, $phone, $address, $amount, $note, $coupon_id, $shipping_id, $payment_method)
    {
        $sql = 'insert into order_details(name,email,phone,address,amount,note,user_id,coupon_id,shipping_id,payment_method,created_at,updated_at) values(?,?,?,?,?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note, $_SESSION['user']['user_id'], $coupon_id, $shipping_id, $payment_method]);
    }
    public function getLastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
    public function getAllOrders()
    {
        $sql = 'select * from order_details';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function  editStatus()
    {
        $sql = 'select * from order_details where order_detail_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_Id']]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateStatus($status)
    {
        $sql = 'update order_details set status =? where order_detail_Id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status, $_GET['order_detail_Id']]);
    }
    public function deleteOrder()
    {
        $sql = 'detete from order_details where order_detail_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['order_detail_Id']]);
    }
    public function getOrdersByUser($user_id)
    {
        $sql = 'SELECT * FROM order_details WHERE user_id = ? ORDER BY created_at DESC';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelOrder($status)
{
    $sql = "UPDATE order_details 
            SET status = ? 
            WHERE order_detail_Id = ? 
            AND status = 'Pending'";
    $stmt = $this->connect()->prepare($sql);
    return $stmt->execute([$status, $_GET['order_detail_Id']]);
}

public function getOrderDetailById($order_detail_id)
{
    // Lấy chi tiết đơn hàng
    $sql = "SELECT * FROM order_details WHERE order_detail_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_detail_id]);
    $orderDetail = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($orderDetail) {
        // Lấy thông tin phương thức vận chuyển
        $shippingSql = "SELECT * FROM ships WHERE ship_Id = :shipping_id";
        $shippingStmt = $this->connect()->prepare($shippingSql);
        $shippingStmt->bindParam(':shipping_id', $orderDetail['shipping_id']);
        $shippingStmt->execute();
        $shipping = $shippingStmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem thông tin phí vận chuyển có tồn tại không
        if ($shipping) {
            $orderDetail['shipping_price'] = $shipping['shipping_prices'];
        } else {
            // Nếu không có, đặt phí vận chuyển bằng 0
            $orderDetail['shipping_price'] = 0;
        }
    }

    return $orderDetail;
}

public function getOrderItems($order_detail_id)
{
    $sql = "SELECT 
                o.order_id,
                p.name AS product_name,
                p.image,
                pv.price,
                pv.sale_price,
                o.quantity,
                vc.color_name,
                vs.size_name
            FROM orders o
            JOIN product_variants pv ON o.variant_id = pv.product_variant_Id
            JOIN product p ON o.product_id = p.product_id
            LEFT JOIN variant_colors vc ON pv.variant_color_id = vc.variant_color_Id
            LEFT JOIN variant_sizes vs ON pv.variant_size_id = vs.variant_size_Id
            WHERE o.order_detail_id = ?";
    
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_detail_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






}
