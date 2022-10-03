<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="normalize.css">
	<meta charset="utf-8">
	<title>My web page</title>
	<link rel="stylesheet" href="./assets/css/index.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<script src="./assets/js//index.js"></script>
</head>

<body>
	<?php
	# Include header
	require __DIR__ . '/modules/partials/header.php';
	# Include main contain
	require __DIR__ . '/modules/home.php';
	# Include footer
	require __DIR__ . '/modules/partials/footer.php';
	?>
</body>

</html>
