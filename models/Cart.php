<?php
class Cart {
    // Lấy toàn bộ giỏ hàng từ session
    public function getCart() {
        return $_SESSION['cart'] ?? [];
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addItem($item) {
        $key = $item['product_id'] . '-' . $item['variant_color'] . '-' . $item['variant_size'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity'] += $item['quantity'];
        } else {
            $_SESSION['cart'][$key] = $item;
        }
    }

    // Cập nhật số lượng sản phẩm
    public function updateItem($key, $quantity) {
        if (isset($_SESSION['cart'][$key])) {
            if ($quantity <= 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $quantity;
            }
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeItem($key) {
        if (isset($_SESSION['cart'][$key])) {
            unset($_SESSION['cart'][$key]);
        }
    }

    // Tính tổng tiền giỏ hàng
    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] ?? [] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Đếm số lượng sản phẩm trong giỏ hàng
    public function getItemCount() {
        return count($_SESSION['cart'] ?? []);
    }
}