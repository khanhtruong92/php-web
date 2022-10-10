<!-- MAIN content -->
<div id="main">
    <div id="main-content">
        <h3>My profile.</h3>

        <!-- Hiển thị nội dung, sử dụng $user đã có ở file header.php -->
        <!-- homework 4 -->
        <p><strong>ID: </strong><?php echo $user['id']; ?></p>
        <p><strong>Fullname: </strong><?php echo $user['fullname']; ?></p>
        <p><strong>Username: </strong><?php echo $user['username']; ?></p>
        <p><strong>Email: </strong><?php echo $user['email']; ?></p>

    </div>
    <!-- embed sidbar.php -->
    <?php require __DIR__ . '/partials/sidebar.php'; ?>
</div>
