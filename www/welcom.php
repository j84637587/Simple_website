<?php
	ini_set("display_errors", "On");
	session_start();
	/*是否有session*/
	if(empty($_SESSION['users']['account']) || empty($_SESSION['users']['password'])){
		echo "<script>	setTimeout(function(){window.location.href='index.php';},500);	</script>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>登陸成功</title>
</head>
<body>
		<!--UI設定-->
	<div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 10%; left:50%;">
	  <?php echo "使用者, 歡迎回來! " . $_SESSION['users']['account'];?>
	  <p></p>
	  <input type ="button" onclick="location.href='./method/logout.php'" value="登出帳號"/>
	  <input type ="button" onclick="location.href='./method/changepassword.php'" value="修改密碼"/>
	</div>
</body>
</html>