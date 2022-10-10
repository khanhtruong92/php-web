<?php
// Define an array to contain page titles
$pageTitles = array(
	'home' => 'Home',
	'profile' => 'My Profile',
	'register' => 'Register',
	'login' => 'Login',
	'logout' => 'Logout' // Thêm 1 dòng
);
// Get page title depend on what is using module
$pageTitle = $pageTitles[$module];

// Get session and assign to variable $userId
$userId = $_SESSION['login_user_id'];
// Default, user is not logged-in
$user = false;

if ($userId) {
	// Query user data by $userId
	$sql = "SELECT id, username, email, fullname, password
		FROM users
		WHERE id = $userId
		LIMIT 0,1";

	$result = $mysql->query($sql);

	// If there is user information, mean that user is logged-in
	$user = $result->fetch_array() ?? false;
}

// Define fullname to show on header
$fullname = $user ? $user['fullname'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="normalize.css">
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="./assets/css/index.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<script src="./assets/js//index.js"></script>
</head>

<body>
	<!-- The Header -->
	<header>
		<div>
			<h4>The logo <?php echo $_SESSION['login_user_id']; ?></h4>
		</div>
		<div>
			<h2 class="slogan">The header slogan</h2>
		</div>
		<div id="form">
			<ul>
				<li>Hi <span><?php echo $fullname; ?></span></li>
				<!-- <li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li> -->
				<?php if (!$user) { ?>
					<li><a href="javascript:void(0)" onclick="showLoginForm()">Login</a></li>
				<?php } else { ?>
					<!-- Chuyển hướng thông tin vào file logout.php để xử lý -->
					<li><a href="./index.php?m=logout">Logout</a></li>
				<?php } ?>
			</ul>

			<form id="login" action="./index.php?m=login" method="post">
				<input type="text" name="username" placeholder="User name" />
				<input type="password" name="password" placeholder="Password" />
				<label><input type="checkbox" name="rememberUsername" />Remember user name </label>
				<button type="submit" name="Login">Login</button>
			</form>
			<form method="GET" id="search">
				<input type="text" name="keyword" />
				<i class="material-icons">search</i>
			</form>
		</div>
	</header>

	<!-- The menu -->
	<nav>
		<ul>
			<li><a href="./index.php">Home</a></li>

			<!-- Tuỳ chỉnh hiển thị main menu, homework 2 -->
			<?php if (!$user) { ?>
				<li><a href="./index.php?m=register">Register</a></li>
			<?php } else { ?>
				<li><a href="./index.php?m=profile">My Profile</a></li>
			<?php } ?>
			
		</ul>
	</nav>
