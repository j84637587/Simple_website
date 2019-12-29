<?php
    session_start();
    /*是否有session*/
	if(empty($_SESSION['users']['account']) || empty($_SESSION['users']['password'])){
		echo "<script>
		alert('請登入.');
		document.location.href='../index.php';
		</script>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<title>更改密碼頁面</title>
  </head>
  <body>
	<form action="changepassword_way.php" method="post">
	  <div class = "list">
		<p>密碼：<input type="text" maxlength="20" placeholder="密碼" name="password"></p>
		<p>確認密碼：<input type="text" maxlength="20" placeholder="確認密碼" name="password_check"></p>
		<p>修改密碼：<input type="text" maxlength="20" placeholder="修改密碼" name="password_change"></p>
		<p></p>
		<input type="submit" name="submit" value="確認修改" class="btn" id="btn"></input>
		<input type="button" onclick="javascript:history.go(-1)" value="返回上一頁"></input>
            <!-- 用post把資料傳給register.php -->
	  </div>
	</form>
  </body>
</html>
