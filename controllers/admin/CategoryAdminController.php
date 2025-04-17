<?php
require_once '../helpers/helpers.php';

require_once '../models/category.php';
class CategoryAdminController extends Category
{
   public function index()
   {
    checkAdminAccess(); // Kiểm tra quyền admin trước khi tiếp tục

    $listCategories = $this->listCategory();
    
    include '../views/admin/category/list.php';
   }
   public function addCategory()
   {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createCategory']))
    {
        $errors = [];
        if(empty($_POST['name'])) {
            $errors['name'] = 'Vui Lòng nhập tên danh mục';
        }
        if(empty($_POST['status'])) {
            $errors['status'] = 'Vui Lòng chọn trạng thái';
        }
        if(empty($_POST['description'])) {
            $errors['description'] = 'Vui Lòng nhập mô tả';
        }
        if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK){
            $errors['image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
        }
        $_SESSION['errors'] = $errors;
        if(count($errors)>0){
            $_SESSION['error'] ='Vui lòng nhập đầy đủ dữ liệu';
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }


        $file = $_FILES['image'];
        $images = $file['name'];

        if(move_uploaded_file($file['tmp_name'],'./images/category/'.$images)){
            $createCategory = $this->create($_POST['name'],$images,$_POST['status'],$_POST['description']);
            if($createCategory){
                $_SESSION['success'] = 'Thêm thành công';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    include '../views/admin/category/create.php';
   }
   public function editCategory()
   {
    $getCategory = $this->detail();
    if($getCategory) {
        return $getCategory;
    }else{
        $_SESSION['error'] = 'không thấy danh mục';
    }
   }

   public function updateCategory(){
    $getCategory = $this->detail();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCategory'])){
        $errors = [];
        if(empty($_POST['name'])) 
        {
            $errors['name'] = 'Vui Lòng nhập tên danh mục';
        }
        if(empty($_POST['status'])) 
        {
            $errors['status'] = 'Vui Lòng chọn trạng thái';
        }
        if(empty($_POST['description'])) 
        {
            $errors['description'] = 'Vui Lòng nhập mô tả';
        }

        $_SESSION['errors'] = $errors;

        $file = $_FILES['image'];
        $images = $file['name'];
        if($file['size'] > 0) {
            move_uploaded_file($file['tmp_name'],'./images/category/'.$images);
            if(!empty($_POST['old_image']) && file_exists('./images/category/'.$_POST['old_image'])){
                unlink('./images/category/' .$_POST['old_image']);
            }
        }else{
            $images = $_POST['old_image'];
        }
        $updateCategory = $this->update($_GET['id'],$_POST['name'],$images,$_POST['status'],$_POST['description']);
        if($updateCategory){
            $_SESSION['success'] = 'Cập nhật danh mục thành công';
            header('Location:index.php?act=category');
                exit();
        }else{
            $_SESSION['error'] = 'Cập nhật thất bại,Vui lòng thứ lại';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    include '../views/admin/category/edit.php';

   }
  
}