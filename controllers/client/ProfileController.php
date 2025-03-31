<?php
class ProfileController extends User{
    public function updateProfile() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])){
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui Lòng nhập tên ';
            }

            if (empty($_POST['email'])) {
                $errors['email'] = 'Vui Lòng nhập email';
            }
            if (empty($_POST['phone'])) {
                $errors['phone'] = 'Vui Lòng nhập số điện thoại';
            }
            if (empty($_POST['address'])) {
                $errors['address'] = 'Vui Lòng nhập địa chỉ';
            }
            if (empty($_POST['gender'])) {
                $errors['gender'] = 'Vui Lòng chọn giới tính';
            }
             if(count($errors)>0){
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
             }

            $_SESSION['errors'] = $errors;
           $user = $this->updateUser($_POST['name'], $_POST['email'],$_POST['phone'],$_POST['address'],$_POST['gender']);
              if($user){
                $_SESSION['user'] = $this->getUserById($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cập nhật thông tin thành công';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
              }else{
                $_SESSION['errors'] = 'Cập nhật thông tin khôn thành công vui lòng kiểm tra lại';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
              }  
           
        }
    }
}