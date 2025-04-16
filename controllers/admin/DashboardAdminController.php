<?php
require_once '../models/Order.php';
require_once '../models/Product.php';

class DashboardAdminController {
    private $order;
    private $product;

    public function __construct() {
        $this->order = new Order();
        $this->product = new Product();
    }

    public function index() {
        // Lấy dữ liệu từ model
        $totalOrders = $this->order->getTotalOrders();
        $totalRevenue = $this->order->getTotalRevenue();
        $pendingOrders = $this->order->getOrdersByStatus('Pending');
        $completedOrders = $this->order->getOrdersByStatus('Completed');
        $totalProducts = $this->product->getTotalProducts();
        $soldProducts = $this->product->getSoldProducts();

        // Truyền dữ liệu vào view
        include '../views/admin/index.php';
    }
}
