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
}