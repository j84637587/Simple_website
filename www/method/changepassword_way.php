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
	$account = $_SESSION['users']['account'];
	$password = $_POST['password'];
	$password_check = $_POST['password_check'];
	$password_change = $_POST['password_change'];

	if(empty($password) || empty($password_check) || empty($password_change)){
		echo "<script>alert('請不要留下空白欄位!');	history.go(-1);	</script>";
		exit();
	}elseif($password != $password_check){//兩次密碼不符合
		echo "<script>alert('兩次密碼不符合!');	history.go(-1);	</script>";
		exit();
	}elseif(strlen($password_change) < 8){//密碼太短
		echo "<script>alert('新密碼長度不足!');	history.go(-1);	</script>";
		exit();
	}elseif(preg_match("/\W/",$password_change)){
		echo "<script>alert('只允許英文、數字與底線!');	history.go(-1);	</script>";
		exit();
	}elseif($password == $password_change){
		echo "<script>alert('新密碼請勿與舊密碼相同!');	history.go(-1);	</script>";
		exit();
	}elseif($password != $_SESSION['users']['password']){
		echo "<script>alert('密碼輸入錯誤!'); history.go(-1); </script>";
		exit();
	}else{
		require_once "../connect.php";
		$sql = "UPDATE users SET password = '$password_change' WHERE account = '$account' AND password = '$password'";
		try{
			$result = $con->query($sql);
		}catch(Exception $e){
			echo("選擇失敗: " . $con->mysqli_error);
			exit();
		}
		mysqli_close($con);
		echo "<script>
		alert('成功修改密碼.');
		document.location.href='logout.php';
		</script>";
	}
?>