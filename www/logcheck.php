<?php
    ini_set("display_errors", "On");//debug message
    require_once "connect.php";
	$account = check_input($_POST['account']);
    //$account = mysqli_real_escape_string($account, $con);//$_POST['account'];
	$password = check_input($_POST['password']);
    $sql = "SELECT * FROM users WHERE binary account = '$account' AND binary password = '$password'";// AND binary admin = '$admin' 使用binary辨別大小寫
	$result = $con->query($sql);
	mysqli_close($con);
	$followingdata = $result->fetch_assoc(); //讀取陣列資料
	
	function check_input($value)
	{
	// 去除多餘 / 防止sql injection
	if (get_magic_quotes_gpc()){
		$value = stripslashes($value);
	}
	// 如果不是數字則加引號
	if (!is_numeric($value))
	{
		//$value = “‘” . mysqli_real_escape_string($value) . “‘”;
	}
	//$value = addslashes($value)
	return addslashes($value);
	}

	if(!$result){//(error handling)
		echo ("連接失敗: ".mysqli_error($con) . "<br>");
		exit();
	}
	if (empty($password)|| empty($account)){//blank
			echo "<script>	alert('Code#100000 請輸入帳號密碼！');	</script>";
			echo "<script>	setTimeout(function(){window.location.href='login_wrong.html';},500);	</script>";//500ms
			exit();
	//too short
	}elseif (strlen($account) < 6 || strlen($password) < 8) {
			echo "<script>	alert('Code#100001 帳號密碼錯誤！');	history.go(-1);	</script>";
			echo "<script>	setTimeout(function(){window.location.href='login_wrong.html';},500);	</script>";
			exit();
	//not match to sql
	}elseif ($followingdata['password']!=$password||$followingdata['account']!=$account){
			echo "<script>	alert('帳號密碼錯誤！');	history.go(-1);	</script>";
			echo "<script>	setTimeout(function(){window.location.href='login_wrong.html';},500);	</script>";
			exit();
	}elseif ($followingdata['account']==$account && $followingdata['password']== $password) {
			echo "<script>	alert('登入成功');</script>";
		    session_start();//SESSION
			$_havelogin = true;
            $_SESSION['users'] = $followingdata;
			if($followingdata['admin'] == 1){//if admin
				echo "<script>	setTimeout(function(){window.location.href='welcomadmin.php';},500);	</script>";
			}else{
				echo "<script>	setTimeout(function(){window.location.href='welcom.php';},500);	</script>";
			}
	}
 ?>