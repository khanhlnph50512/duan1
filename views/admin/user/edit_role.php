<?php include '../views/admin/layout/header.php'; ?>
<div class="page-content">
    <?php
    // Kiểm tra nếu có thông báo lỗi
    if (isset($_SESSION['errors'])) {
        echo "<div class='alert alert-danger'>{$_SESSION['errors']}</div>";
        unset($_SESSION['errors']);
    }

    // Kiểm tra nếu có thông báo thành công
    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
    }
    ?>

    <div class="container">
        <h3 class="my-4">Chỉnh sửa vai trò người dùng</h3>

        <form method="POST" action="?act=edit-role&user_id=<?php echo $user['user_id']; ?>" class="needs-validation" novalidate>
            <div class="row mb-3">
                <label for="role_id" class="col-sm-2 col-form-label">Chọn vai trò:</label>
                <div class="col-sm-10">
                    <select name="role_id" id="role_id" class="form-select" required>
                        <?php if ($user['role_id'] == 1): ?>
                            <option value="1" selected>User</option>
                            <option value="2">Admin</option>
                        <?php else: ?>
                            <option value="2" selected>Admin</option>
                        <?php endif; ?>
                    </select>
                    <div class="invalid-feedback">
                        Vui lòng chọn vai trò người dùng.
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật vai trò</button>
            </div>
        </form>
    </div>
</div>
<?php include '../views/admin/layout/footer.php'; ?>
