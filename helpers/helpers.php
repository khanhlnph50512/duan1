<?php 
function checkAdminAccess() {
    // Kiểm tra nếu người dùng chưa đăng nhập hoặc không phải là admin
    if (!isset($_SESSION['user']) || $_SESSION['user']['role_type'] !== 'admin') {
        header('Location: ?act=index'); // Chuyển hướng về trang đăng nhập
        exit();
    }
}
