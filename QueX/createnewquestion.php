<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create new question</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<?php
	session_start();
	$conn = mysqli_connect("localhost","root","root","questionxsystem");
	if(isset($_POST["back"])){
		header("LOCATION: index.php");
	}
	if(isset($_POST['up'])){
		if(isset($_POST['question'])){
			if(trim($_POST['question']) != ""){
				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$now = date("d/m/Y",time()-10*10*60*24+60*60*24);
				$conn->query("INSERT INTO `post` (`user`,`subject`,`class`,`question`,`time`) VALUES ('".htmlspecialchars($_SESSION['name1'])."','".$_POST['subject']."','".$_POST['class']."','".htmlspecialchars($_POST['question'])."','".$now."')");
			}
		}
	}
	?>
</head>
<body>
	<form method="post" class="newqsx">
		<textarea placeholder="Tạo bài viết" name="question"></textarea>
		Chọn môn học: <select name="subject">
			<option value="Toán">Toán</option>
			<option value="Văn">Ngữ văn</option>
			<option value="Anh">Ngoại ngữ</option>
			<option value="Sử">Lịch sử</option>
			<option value="Địa">Địa lý</option>
			<option value="Sinh">Sinh học</option>
			<option value="Lý">Vật lý</option>
			<option value="Hóa">Hóa học</option>
			<option value="GDCD">GDCD</option>
			<option value="Công Nghệ">Công nghệ</option>
			<option value="Tin">Tin học</option>
		</select><br>
		Chọn lớp của bạn: <input type="number" min="1" max="12" value="1" step="1" class="numberbox1" name="class">
		<button name="up">Đăng lên</button>
		<button name="back">Quay lại</button>
	</form>
</body>
</html>