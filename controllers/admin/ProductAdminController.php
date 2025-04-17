<?php
require_once '../helpers/helpers.php';

require_once '../models/Product.php';
class ProductAdminController extends Product
{
    public function index()
    {
        checkAdminAccess(); // Kiểm tra quyền admin trước khi tiếp tục

        $listProduct = $this->listProduct();
        include '../views/admin/product/list.php';
    }
    public function create()
    {
        checkAdminAccess();

        $listColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        $listCategories = $this->getAllCategory();
        include '../views/admin/product/create.php';
    }
    public function store()
    {
        checkAdminAccess();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_products'])) {
            $errors = [];
            if (empty($_POST['product_name'])) {
                $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_price'])) {
                $errors['product_price'] = 'Vui Lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui Lòng nhập giá khuyến mãi';
            }
            if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['product_image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            }

            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui Lòng chọn kích thước';
            }

            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui Lòng chọn màu';
            }

            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui Lòng nhập mô tả';
            }

            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui Lòng nhập số lượng';
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui Lòng nhập giá khuyễn mãi biến thể' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui Lòng nhập giá biến thể' . ($key + 1);
                }
            }

            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:?act=product-create');
            }
            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                $addProduct = $this->addProduct(
                    $_POST['product_name'],
                    $product_image,
                    $_POST['product_price'],
                    $_POST['product_sale_price'],
                    $_POST['product_slug'],
                    $_POST['product_description'],
                    $_POST['category_id']
                );
                if ($addProduct) {
                    $product_id = $this->getLastInsertId();
                    if (isset($_POST['variant_size']) && isset($_POST['variant_color'])) {
                        foreach ($_POST['variant_size'] as $key => $size) {
                            $addProductVariant = $this->addProductVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $_POST['variant_size'][$key]


                            );
                        }
                    }
                    if (!empty($_FILES['gallery_image']['name'][0])) {
                        $file = $_FILES['gallery_image'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $imageArray =
                                uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                            move_uploaded_file($file['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                            $this->addGallery($product_id, $imageArray);
                        }
                    }
                }
                $_SESSION['success'] = 'Thêm mới sản phẩm thành công';
                header('Location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Thêm mới sản phẩm thất bại, vui lòng thử lại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    public function edit()
    {
        checkAdminAccess();

        $product = $this->getProductById($_GET['id']);
        $variants = $this->getProductVariantById($_GET['id']);
        $gallery = $this->getProductGalleryById();
        $listCategories = $this->getAllCategory();
        $listColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        include '../views/admin/product/edit.php';
    }
    public function update()
    {
        checkAdminAccess();

        $errors = [];
        if (empty($_POST['product_name'])) {
            $errors['product_name'] = 'Vui Lòng nhập tên danh mục';
        }

        if (empty($_POST['product_price'])) {
            $errors['product_price'] = 'Vui Lòng nhập giá sản phẩm';
        }
        if (empty($_POST['product_sale_price'])) {
            $errors['product_sale_price'] = 'Vui Lòng nhập giá khuyến mãi';
        }
        // if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
        //     $errors['product_image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
        // }

        if (empty($_POST['variant_size'])) {
            $errors['variant_size'] = 'Vui Lòng chọn kích thước';
        }

        if (empty($_POST['variant_color'])) {
            $errors['variant_color'] = 'Vui Lòng chọn màu';
        }

        if (empty($_POST['product_description'])) {
            $errors['product_description'] = 'Vui Lòng nhập mô tả';
        }




        // kiem tra tung phan tu trong cac mang
        foreach ($_POST['variant_quantity'] as $key => $variant_quantitty) {
            if (empty($variant_quantitty)) {
                $errors['variant_quantity'][$key] = 'Vui Lòng chọn số lượng biến thể' . ($key + 1);
            }
        }
        foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
            if (empty($variant_sale_price)) {
                $errors['variant_sale_price'][$key] = 'Vui Lòng nhập giá khuyễn mãi biến thể' . ($key + 1);
            }
        }
        foreach ($_POST['variant_price'] as $key => $variant_price) {
            if (empty($variant_price)) {
                $errors['variant_price'][$key] = 'Vui Lòng nhập giá biến thể' . ($key + 1);
            }
        }

        $_SESSION['errors'] = $errors;
        if ($errors) {
            header('Location:?act=product-create');
        }




        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-product'])) {
            $file = $_FILES['product_image'];

            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                    // xoa anh cu
                    if (isset($_POST['old_product_image']) && file_exists('./images/product/' . $_POST['old_product_image'])) {
                        unlink('./images/product' . $_POST['old_product_image']);
                    }
                } else {
                    $product_image = $_POST['old_product_image'];
                }
            }
            // cap nhat thong tin san pham
            $updateProduct = $this->updateProduct(
                $_POST['product_id'],
                $_POST['product_name'],
                $product_image,
                $_POST['product_price'],
                $_POST['product_sale_price'],
                $_POST['product_slug'],
                $_POST['product_description'],
                $_POST['category_id']
            );

            if ($updateProduct) {
                $product_id = $_POST['product_id'];
                // cap nhat bien the
                if (isset($_POST['variant_size']) && isset($_POST['variant_color'])) {
                    foreach ($_POST['variant_size'] as $key => $size) {
                        // kiem tra xem bien the da ton tai hay chuwa
                        if (isset($_POST['product_variant_id'][$key]) && !empty($_POST['product_variant_id'][$key])) {
                            // cap nhat bien the hien co trong csdl
                            $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $product_id,
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $_POST['variant_color'][$key],
                                $size

                            );
                        } else {
                            $addProductVariant = $this->addProductVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $_POST['variant_size'][$key]



                            );
                        }
                    }
                }
                // cap nhat anh
                if (!empty($_FILES['gallery_image']['name'][0])) {
                    if (!empty($_FILES['gallery_image']['name'][0])) {
                        $file = $_FILES['gallery_image'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $imageArray =
                                uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                            move_uploaded_file($file['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                            $this->addGallery($_GET['id'], $imageArray);
                        }
                    }

                    // thong bao

                } else {
                    $imageArray = $_POST['old_gallery_image'];
                }
                $_SESSION['success'] = 'Cập nhật thành công';
                header('Location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật thất bại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    public function deleteGallery()
    {
        try {
            $gallery = $this->getGallery();
            if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                unlink('./images/product_gallery/' . $gallery['image']);
            }
            $this->removeGallery();
            $_SESSION['success'] = 'Xóa ảnh  thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function deleteProductVariant()
    {
        try {
            $this->removeProductVariant();
            $_SESSION['success'] = 'Xóa biến thể  thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function deleteProduct()
    {
        try {
            $galleries = $this->getProductGalleryById();
            foreach ($galleries as $gallery) {
                if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                    unlink('./images/product_gallery/' . $gallery['image']);
                }
            }
            $this->removeProduct();
            $_SESSION['success'] = 'Xóa biến thể  thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    
}
