<?php
	require_once "connect.php";
	$data = $_POST["deleteRecord"];
	if(!$result = mysqli_query($con, "DELETE FROM users WHERE account = $data")){
		echo("Error: " . mysqli_error($con));//.getMessage()
		exit();
	}else{
		echo "<script>alert('成功刪除 $data 的資料!');	history.go(-1);	</script>";//history.go(-1);
	}
	mysqli_close($con);
?>