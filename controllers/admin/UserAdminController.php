<?php
require_once '../helpers/helpers.php';

require_once '../models/User.php';
class UserAdminController extends User{
    public function index(){
        checkAdminAccess(); // Kiểm tra quyền admin trước khi tiếp tục

        $ListUsers = $this->listUser();
        
        include "../views/admin/user/list.php";

    }
    public function editRole() {
        checkAdminAccess(); // Kiểm tra quyền admin trước khi tiếp tục

        if (!isset($_GET['user_id'])) {
            $_SESSION['errors'] = "Thiếu ID người dùng.";
            header("Location: ?act=role-list");
            exit;
        }

        // Lấy thông tin người dùng từ database
        $user = $this->getUserById($_GET['user_id']);
        
        if (!$user) {
            $_SESSION['errors'] = "Người dùng không tồn tại.";
            header("Location: ?act=role-list");
            exit;
        }

        // Kiểm tra nếu người dùng hiện tại là admin và cố gắng sửa thành user
        if ($user['role_id'] == 2 && isset($_POST['role_id']) && $_POST['role_id'] == 1) {
            $_SESSION['errors'] = "Bạn không thể thay đổi vai trò từ admin sang user.";
            header("Location: ?act=role-list");
            exit;
        }

        // Cập nhật vai trò người dùng
        if (isset($_POST['role_id'])) {
            $this->updateUserRole($user['user_id'], $_POST['role_id']);
            $_SESSION['success'] = "Cập nhật vai trò thành công!";
            header("Location: ?act=role-list");
            exit;
        }

        include "../views/admin/user/edit_role.php"; // Hiển thị form sửa đổi vai trò
    }

    // Cập nhật vai trò người dùng
    public function updateUserRole($userId, $roleId) {
        $sql = 'UPDATE users SET role_id = ? WHERE user_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$roleId, $userId]);
    }
    
}