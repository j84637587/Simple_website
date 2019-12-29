<?php
ini_set("display_errors", "On");
$server="localhost";
$db_username="root";
$db_password="quareta75";
$db_sql="website";
/*上面資料是否有正確輸入*/
if(empty($server) || empty($db_username) || empty($db_password) || empty($db_sql)){
	echo "<script>alert('資料庫資料錯誤!');	history.go(-1);	</script>";
	exit();
}
/*連接到資料庫*/
try{
	$con = mysqli_connect($server,$db_username,$db_password);//connect
}catch(Exception $e){
	echo("連接失敗: " . $con->connect_error);//.$e->getMessage() //mysqli_error($con)
	exit();
}
/*資料庫選擇*/
if(!mysqli_select_db($con, $db_sql)){
	echo("連接失敗: " . mysqli_error($con));
	exit();
}
mysqli_query($con, 'SET CHARACTER SET utf8');
?>