<!-- MAIN content -->
<div id="main">
    <div id="main-content">

        <?php
        if (!$_SESSION['login_user_id']) { // Hiển thị message nếu không tồn tại Session đăng nhập
            echo "<h3>Welcome to the website! Login to see users list</h3>";
        } else { // Nếu tồn tại người dùng đã login, thực hiện lấy và hiển thị thông tin từ database lên home page

            echo "<h3>Users list</h3>";

            $sql_query = "SELECT * FROM users";

            $result = $mysql->query($sql_query);

            if ($result->num_rows > 0) { // Hiển thị thông tin nếu Database có dữ liệu
        ?>
                <ol>
                    <?php while ($row = $result->fetch_array()) { ?>
                        <li><?php echo $row['username']; ?></li>
                    <?php } ?>
                </ol>
        <?php }
        }
        ?>

    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
</div>
