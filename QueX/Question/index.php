<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Question</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
	session_start();
	$conn = mysqli_connect("localhost","root","root","questionxsystem");
	if(isset($_GET["idbaiviet"])){
		$idbaiviet = $_GET['idbaiviet'];
		$rows = mysqli_num_rows($conn->query("SELECT * FROM `post` WHERE id='$idbaiviet'"));
		if($rows === 1){
			echo '<div class="tab1"><div class="username">'.mysqli_fetch_assoc($conn->query("SELECT * FROM `post` WHERE id='$idbaiviet'"))['user'].'</div><br>'.mysqli_fetch_assoc($conn->query("SELECT * FROM `post` WHERE id='$idbaiviet'"))['question'].'</div>';
		}else{
			header("LOCATION: ../index.php");
		}
	}else{
		header("LOCATION: ../index.php");
	}
	if(isset($_POST['ans'])){
		if(trim($_POST['ans']) != ''){
			$now = date("d/m/Y",time()-10*10*60*24+60*60*24);
			$conn->query("INSERT INTO `comment` (`user`,`idquestion`,`comment`,`time`) VALUES ('".$_SESSION['name1']."','".$idbaiviet."','".htmlspecialchars($_POST['ans'])."','".$now."')");
		}
	}
	?>
</head>
<body>
	<center><a href="../index.php">Quay lại</a></center>
	<?php
	$result = $conn->query("SELECT * FROM `comment` WHERE `idquestion`='$idbaiviet' ORDER BY `id` DESC");
	while($rows = mysqli_fetch_assoc($result)){
		echo "<div class='baiviet1'>" . $rows['user'] . " " . $rows['time']. "<br>" . $rows['comment'] . "</div>";
	}
	?>
	<form method="post">
		<textarea rows="10" placeholder="Viết câu trả lời của bạn" name="ans"></textarea>
		<button class="btn btn-success">Đăng lên</button>
	</form>
</body>
</html>