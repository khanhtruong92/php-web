<?php
if (isset($_SESSION['login_user_id'])) {
    unset($_SESSION['login_user_id']);
    header('Location: index.php');
}

// Click vào chữ Logout thì sẽ chuyển sang file logout.php để xử lý
// Huỷ $_SESSION['login_user_id'] để trở về trạng thái chưa đăng nhập
?>
