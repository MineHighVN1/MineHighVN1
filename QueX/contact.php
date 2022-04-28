<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	session_start();
	?>
</head>
<body>
	<nav>
		<input type="checkbox" id="check" style="display: none;">
		<label for="check" class="checkbtn">
			<i class="fa fa-bars"></i>
		</label>
		<label class="title">QuestionX</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="setting.php">Profile</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php" class="active">Contact</a></li>
		</ul>
	</nav>
	Xin chào <b><?=htmlspecialchars($_SESSION['name1'])?></b><br>
</body>
</html>