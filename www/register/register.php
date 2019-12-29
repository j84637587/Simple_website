<head>
	<meta charset='utf-8' />
</head>
<?php 
	header("Content-Type: text/html; charset=utf8");
	ini_set("display_errors", "On");//debug message
	require_once "../connect.php";//connect to sql
	
	if(!isset($_POST['submit'])){//ifsubmit
		exit("錯誤執行");
	}
	
	$account = $_POST['account'];
	$password = $_POST['password'];
	$password_check = $_POST['password_check'];
	
	if(preg_match("/\W/",$account) || preg_match("/\W/",$password)){ //if find word not in [^A-Za-z0-9_] return true
		echo "<script>alert('只允許英文、數字與底線!');	history.go(-1);	</script>";
		exit();
	}elseif(empty($account) || empty($password) || empty($password_check)){//empty
		echo "<script>alert('請不要留下空白欄位!');	history.go(-1);	</script>";
		exit();
	}elseif(strlen($account) < 6 || strlen($password) < 8){//too short
		echo "<script>alert('帳號密碼長度不足!');	history.go(-1);	</script>";
		exit();
	}elseif($password != $password_check){//not match
		echo "<script>alert('兩次密碼不符合!');	history.go(-1);	</script>";
		exit();
	}elseif($password == $account){//same
		echo "<script>alert('帳號與密碼請勿相同!');	history.go(-1);	</script>";
		exit();
	}
	$sql_if_accout_exit = "SELECT * FROM users WHERE binary account = '$account'";
	$result = $con->query($sql_if_accout_exit);
	$db_line = mysqli_num_rows($result);
	
	if($db_line) { // >=1
		echo "<script>alert('這個帳號已經存在了！請使用其他帳號註冊');	history.go(-1);	</script>";
		exit();
	}

	$sql = "INSERT INTO users (account, password) VALUES ('$account', '$password_check')";
	$result = $con->query($sql);

	if(!$result){//(error handling)
		echo "<script>	alert('Error: ' . mysql_error());	history.go(-1);	</script>";//輸出錯誤
		exit();
	}else{
		echo "<script>
		alert('恭喜! 成功註冊.');
		document.location.href='../login.html'; </script>;
		//setTimeout(function(){window.location.href='../login.html';},500);	</script>";
		//header("Location:../index.php");
	}
	mysqli_close($con);
?>