<?php
require_once '../Connect/connect.php';
class Cart extends connect {
    public function getAllCart() {
        $sql = 'select
        carts.cart_Id as cart_id,
        product.name as product_name,
        product.product_id as product_id,
        product.image as product_image,
        product.slug as product_slug,
        product_variants.product_variant_Id as variant_id,
        product_variants.price as product_variant_price,
        product_variants.sale_price as product_variant_sale_price,
        variant_colors.color_name  as variant_color_name,
        variant_sizes.size_name as variant_size_name,
        carts.quantity as cart_quantity

        from carts
        left join product on carts.product_id = product.product_id
        left join product_variants on product_variants.product_variant_Id = carts.variant_id
        left join variant_colors on product_variants.variant_color_id = variant_colors.variant_color_Id
        left join variant_sizes on product_variants.variant_size_id = variant_sizes.variant_size_Id

        where carts.user_id = ?
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addToCart($user_id,$product_id,$variant_id,$quantity){
        $sql = 'insert into carts(user_id,product_id,variant_id,quantity) values(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
       return  $stmt->execute([$user_id,$product_id,$variant_id,$quantity]);

    }
    public function checkCart(){
        $sql = 'select * from carts where user_id = ? and product_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id'],$_POST['product_id'],$_POST['variant_id']]);
        return $stmt->fetch();
    }
    public function updateCart($user_id,$product_id,$variant_id,$quantity){
        $sql = 'update carts set quantity = ? where user_id = ? and product_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity,$user_id,$product_id,$variant_id]);
    }
    public function updateCartById($cart_id,$quantity) {
        $sql = 'update carts set quantity = ? where cart_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity,$cart_id]);
    }
    public function deleteCart($cart_id){
        $sql = 'delete from carts where cart_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$cart_id]);
    }
    public function getQuantity($product_id, $variant_id) {
        $sql = "select quantity from product_variants where product_id = ? and product_variant_Id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id, $variant_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Trả về số lượng tồn kho, nếu không tìm thấy thì trả về 0
        return $result ? (int)$result['quantity'] : 0;
    }
}