<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
	session_start();
	if(isset($_SESSION['name1'])){
		header("LOCATION: index.php");
	}else{
		$error = "";
		$conn = mysqli_connect("localhost","root","root","loginsystem");
		if(isset($_POST['user']) && isset($_POST['passw'])){
			$user = htmlspecialchars($_POST['user']);
			$passw = htmlspecialchars($_POST['passw']);
			$rows = mysqli_num_rows($conn->query("SELECT * FROM `user1` WHERE `username`='$user' AND `password`='$passw'"));
			if($rows == 1){
				$_SESSION['name1'] = $user;
				header("LOCATION: index.php");
			}else{
				$error = 'Sai tài khoản hoặc mật khẩu';
			}
		}
		echo '<center>'.$error.'</center>';
	}
	?>
</head>
<body>
	<div class="RegLog">
		<center><h2>LOGIN</h2></center>
		<form method="post">
			<input type="text" placeholder="Username" name="user" autocomplete="off">
			<input type="password" placeholder="Password" name="passw" autocomplete="off">
			<button class="btn btn-success">Đăng Nhập</button><br>
		</form> 
		<center><a href="register.php">Bạn chưa có tài khoản? đăng kí</a><center>
	</div>
</body>
</html>