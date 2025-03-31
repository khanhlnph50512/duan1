<?php
require_once '../models/User.php';

class AuthController extends User
{
    public function registers()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui Lòng nhập tên ';
            }

            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Vui Lòng nhập email';
            }
            if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
                $errors['password'] = 'Vui Lòng nhập password';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header('Location: ?act=register');
                exit();
            }
            $register = $this->register($_POST['name'], $_POST['email'], $_POST['password']);
            if ($register) {
                $_SESSION['success'] = 'Tạo tài khoản thành công.Vui lòng đăng nhập';
                header('Location: ?act=login');
                exit();
            } else {
                $_SESSION['errors'] = 'Tạo tài khoản không thành công vui lòng xem lại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../views/client/auth/register.php';
    }
    public function signin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
{
    $errors = [];
    

    if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Vui Lòng nhập email';
    }
    if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
        $errors['password'] = 'Vui Lòng nhập password';
    }

        
    $_SESSION['errors'] = $errors;
    if(count($errors) > 0){
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }

    $login = $this->login($_POST['email'],$_POST['password']);
    if($login){
        $_SESSION['user'] = $login; //luu thong tin nguoi dung dang nhap vao ss
        $_SESSION['success'] = 'Đăng nhập thành công';
        header('Location:http://localhost/DU_AN_1/public/');
        exit();
    }else{
        $_SESSION['errors'] = 'Đăng nhập thất bại.Vui lòng xem lại';
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }
    }
    include '../views/client/auth/login.php';
}
public function logout(){
    
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        header('Location:?act=login');
        exit();
    }

}
}
