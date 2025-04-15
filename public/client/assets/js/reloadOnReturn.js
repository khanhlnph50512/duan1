// Lắng nghe sự kiện "beforeunload" để ghi trạng thái khi người dùng rời trang
window.addEventListener('beforeunload', function() {
    // Đánh dấu rằng trang này đã được thoát
    localStorage.setItem('hasExited', 'true');
});

// Kiểm tra nếu trạng thái 'hasExited' đã được lưu trong localStorage
window.addEventListener('load', function() {
    if (localStorage.getItem('hasExited') === 'true') {
        // Nếu đã thoát trước đó, reload lại trang
        window.location.reload();
        // Xóa trạng thái để tránh reload liên tục
        localStorage.removeItem('hasExited');
    }
});
