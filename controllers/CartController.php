<?php
require_once '../models/Cart.php';

class CartController
{


    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
            $variant_color = $_POST['variant_color'] ?? '';
            $variant_size = $_POST['variant_size'] ?? '';
            $quantity = (int) $_POST['quantity'];

            // Lấy thông tin sản phẩm từ model Product
            $productModel = new Product();
            $product = $productModel->getProductById($product_id);

            if ($product) {
                $cartItem = [
                    'product_id' => $product_id,
                    'product_name' => $product['product_name'],
                    'variant_color' => $variant_color,
                    'variant_size' => $variant_size,
                    'quantity' => $quantity,
                    'price' => $product['product_sale_price'] < $product['product_price'] ? $product['product_sale_price'] : $product['product_price'],
                    'image' => $product['product_image']
                ];

                // Thêm vào session giỏ hàng
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                $key = $product_id . '-' . $variant_color . '-' . $variant_size;
                if (isset($_SESSION['cart'][$key])) {
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                } else {
                    $_SESSION['cart'][$key] = $cartItem;
                }

                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công!'; // Lưu thông báo vào session
                header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước (product-detail)
                exit();
            } else {
                $_SESSION['error'] = 'Sản phẩm không tồn tại!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function viewCart()
    {
        $cartItems = $_SESSION['cart'] ?? [];
        include '../views/client/cart.php';
    }

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $key = $_POST['key'];
            $quantity = (int) $_POST['quantity'];

            if (isset($_SESSION['cart'][$key])) {
                if ($quantity <= 0) {
                    unset($_SESSION['cart'][$key]);
                } else {
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                }
            }
            header('Location: ?act=cart');
            exit();
        }
    }

    public function removeFromCart()
    {
        if (isset($_GET['key'])) {
            $key = $_GET['key'];
            if (isset($_SESSION['cart'][$key])) {
                unset($_SESSION['cart'][$key]);
            }
            header('Location: ?act=cart');
            exit();
        }
    }
}