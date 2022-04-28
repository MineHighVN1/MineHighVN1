<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Dashboard</title>
	<?php
	session_start();
	$conn = mysqli_connect("localhost","root","root","loginsystem");
	if(empty($_SESSION['name1'])){
		header("LOCATION: login.php");
	}
	$user = $_SESSION['name1'];
	$result = $conn->query("SELECT * FROM `user1` WHERE `username`='$user'");
	if(mysqli_num_rows($result) === 0){
		session_destroy();
		header("LOCATION: login.php");
	}
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
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="setting.php">Profile</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</nav>
	<a href="createnewquestion.php">+ Câu hỏi mới</a><br><br>
	<?php
	$conn = mysqli_connect("localhost","root","root","questionxsystem");
	$result = $conn->query("SELECT * FROM `post` ORDER BY `id` DESC");
	while($rows=mysqli_fetch_assoc($result)){
		echo '<div class="baiviet" onclick="window.location.href = '."'"."Question/index.php?idbaiviet=".$rows['id']."'".'">User: '.$rows['user'] . ' Tạo vào: ' . $rows['time'] . " Lớp: " . $rows['class'] . " Môn học: ".$rows['subject']." <br>" .  htmlspecialchars($rows['question']).'</a><br></div>';
	}
	?>
</body>
</html>