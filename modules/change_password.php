<?php
// Chỉ xử lý dữ liệu khi người dùng click nút gửi biểu mẫu changepassword
if (!empty($_POST['changepass'])) {
    // Nhận giá trị từ form data
    $currentPass = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];

    // Chức năng quay trở lại trang change_password
    function comeBack() {
        echo "<p><a href='index.php?m=change_password'>Quay lại</a></p>";
    }

    // Chỉ xử lý nếu cả 3 thông tin được nhập
    if (!$currentPass || !$newPass || !$confirmPass) {
        echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
        comeBack();
        exit;
    }

    // Kiểm tra mật khẩu hiện tại có đúng không
    $currentPass = md5($currentPass);
    if ($currentPass != $user['password']) {
        echo "<p>Mật khẩu hiện tại không chính xác</p>";
        comeBack();
        exit;
    }

    // Chỉ thay đổi mật khẩu mới nếu New password trùng với Confirm password
    if ($newPass !== $confirmPass) {
        echo "<p>Xác nhận mật khẩu mới không chính xác</p>";
        comeBack();
        exit;
    } else {
        $newPass = md5($newPass);
        $sql = "UPDATE users SET password = '$newPass' WHERE id = $userId";
        try {
            $mysql->query($sql);
            // Hiển thị thông báo thành công nếu không có lỗi truy vấn
            echo "<p>Mật khẩu đã cập nhật thành công</p>";
            echo "<p><a href='index.php'>Trang chủ</a></p>";
        } catch (Exception $e) {
            // Nếu có lỗi thì hiển thị lỗi
            echo 'Đã có lỗi xảy ra: ' . $e->getMessage();
        }
    }
}
?>

<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>Change Password</h3>
        <form class="form-register" method="post">
            <p>
                <label>Current Password: </label>
                <input type="text" name="currentPass">
            </p>
            <p>
                <label>New Password: </label>
                <input type="text" name="newPass">
            </p>
            <p>
                <label>Confirm Password: </label>
                <input type="text" name="confirmPass">
            </p>
            <p><input type="submit" value="Change Password" name="changepass"></p>
        </form>

    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
</div>
