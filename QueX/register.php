<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
	session_start();
	$conn = mysqli_connect("localhost","root","root","loginsystem");
	$info = mysqli_connect("localhost","root","root","infomation");
	$error = "";
	if(isset($_SESSION['name1'])){
		header("LOCATION: index.php");
	}else{
		if(isset($_POST['signup'])){
			if(isset($_POST['user']) && isset($_POST['passw']) && isset($_POST['rpassw']) && isset($_POST['school']) && isset($_POST['class'])){
				$user = trim(htmlspecialchars($_POST['user']));
				$passw = htmlspecialchars($_POST['passw']);
				$rpassw = htmlspecialchars($_POST['rpassw']);
				$school = trim(htmlspecialchars($_POST['school']));
				$class = trim(htmlspecialchars($_POST['class']));
				$error = "";

				if($user == "" || $school == "" || $class == ""){
					$error = "<center>Xin vui lòng nhập đầy đủ thông tin</center>";
				}else{
					if(strlen($passw) < 6){
						$error = "<center>Mật khẩu cần tối thiểu 6 chữ số</center>";
					}else if($passw != $rpassw){
						$error = "<center>Mật khẩu và mật khẩu nhập lại không khớp";
					}else{
						if(empty($_POST['rules'])){
							$error = "<center>Vui lòng chấp nhận điều kiện và điều khoản</center>";
						}else{
							$error = "";
							$rows = mysqli_num_rows($conn->query("SELECT `username` from `user1` WHERE `username`='$user'"));
							if($rows == 1){
								$error = "<center>Đã có người dùng tài khoản này</center>";
							}else{
								$conn->query("INSERT INTO `user1` (`username`,`password`) VALUES ('$user','$passw')");
								$info->query("INSERT INTO `user1` (`user`,`class`,`school`) VALUES ('$user','$class','$school')");
								echo "<center>Đăng kí thành công</center>";
							}
						}
					}
				}
			}else{
				$error = "";
			}
		}
	}
	echo $error;
	?>
</head>
<body>
	<div class="RegLog">
		<center><h2>REGISTER</h2></center>
		<form method="post">
			<input type="text" placeholder="Username" name="user" autocomplete="off">
			<input type="password" placeholder="Password" name="passw" autocomplete="off">
			<input type="password" placeholder="Re-Password" name="rpassw" autocomplete="off">
			<center><input type="text" class="short1" placeholder="Nhập trường của bạn" name="school" autocomplete="off">
			<input type="number" min="1" max="12" step="1" value="1" class="short1" name="class" autocomplete="off"></center>
			<center><input type="checkbox" style="display: inline;width: 25px;" name="rules" autocomplete="off">Tôi chấp nhận với <a href="dieukienvadieukhoan.php">Điều kiện và điều khoản</a></center>
			<button class="btn btn-success" name="signup">Đăng kí</button><br>
			<a href="login.php" class="login1">Bạn đã tài khoản? đăng nhập</a>
		</form> 
	</div>
</body>
</html>