<?php
require_once '../models/Category.php';
require_once '../models/Product.php';

class HomeController {
    protected $category;

    protected $product;

    public function __construct(){
        $this->category = new Category();

       
        $this->product = new Product();
    }

    public function index() {
        $category = $this->category->listCategory();
        $product = $this->product->listProduct();
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        $products = $this->product->searchProductsByName($keyword);


        include '../views/client/index.php';
    }
    public function productDetail() {
        $productDetail = $this->product->getProductBySlug($_GET['slug']);
        $productDetail = reset($productDetail);

        include '../views/client/product/productDetail.php';
    }
    public function categoryProduct()
{
    $categoryId = $_GET['id'] ?? null;

    if (!$categoryId) {
        // Nếu không có id, có thể redirect về trang chủ hoặc báo lỗi
        header("Location: index.php");
        exit;
    }

    // Lấy thông tin danh mục
    $categoryDetail = $this->category->detail();

    // Lấy sản phẩm theo danh mục
    $products = $this->product->getProductsByCategory($categoryId);

    // Lấy danh sách danh mục nếu bạn muốn hiển thị sidebar
    $category = $this->category->listCategory();

    include '../views/client/index.php';
}

}