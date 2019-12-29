<?php
	ini_set("display_errors", "On");
    require_once "connect.php";
	/*選擇表單*//*
	if(!$result = mysqli_query($con, "SELECT * FROM users")){
		echo("Error: " . mysqli_error($con));
		exit();
	}*/
	try{
		$result = mysqli_query($con, "SELECT * FROM users");
	}catch(Exception $e){
		echo("連接失敗: " . $con->mysqli_error);
		exit();
	}
	
	mysqli_close($con);
	
	session_start();
	/*是否有session*/
	if(empty($_SESSION['users']['account']) || empty($_SESSION['users']['password']) || empty($_SESSION['users']['admin'])){
		header("location:./login.php");
		exit();
	}else if($_SESSION['users']['admin'] == NULL){ //是否為管理員
		header("location:./welcom.php");
		exit();
	}
?>
<!--刪除會員動作-->
<script>
	function is_remove(){
		if(!confirm("確定要刪除此會員資料嗎？")){
			return false;
		}
	}
</script>
<!DOCTYPE html>
<!--雪特效-->
<style>
.snowflake {
  //color: #fff;
  color:#00FF00
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}
@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}
@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}
@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-resulter-select:none;-moz-resulter-select:none;-ms-resulter-select:none;resulter-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
</style>

<html>
<head>
	<meta charset="UTF-8">
	<title>登陸成功</title>
</head>
<body>
  <!--UI設定-->
  <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 10%; left:50%;">
  <p><?php	echo "您好 管理員 " . $_SESSION['users']['account'];	?></p>
  <!-- 選擇指定帳號(未來增加) -->
  <!--
  <form id="form1" name="form1" method="post" action="./admin/search_data.php">
    <p>搜尋帳號:
	  <input type="text" name="account" id="account"/>
	  <input type="submit" name="botton" id="botton" value="搜尋"/>  
	  <input type="button" onclick="" name="botton" id="botton" value="搜尋"/>  
    </p>
  </form>
	-->
	<!--帳號數量與登出-->
	<p>
		<?php 
			echo "帳號總數:".mysqli_num_rows($result);
		?>
		<input type ="button" onclick="location.href='./method/logout.php'" value="登出帳號"/>
		<input type ="button" onclick="location.href='./method/changepassword.php'" value="修改密碼"/>
	</p>
	<!--表格-->
	<table width="700" border="1">
		<tr>
			<td>帳號</td>
			<td>密碼</td>
			<td>管理員</td>
			<td>日期</td>
		</tr>
		<?php
			for($i=1;$i<=mysqli_num_rows($result);$i++){
				$rs=mysqli_fetch_row($result);
		?>
		<tr>
			<td><?php echo $rs[0]?></td>
			<td><?php echo $rs[1]?></td>
			<td><?php echo $rs[2]?></td>
			<td><?php echo $rs[3]?></td>
			<form action='remove.php' method='POST' onSubmit='return is_remove()'>
				<td>
					<input type='hidden' name='deleteRecord' value= <?php echo $rs[0] ?> />
					<input type='submit' name='delete' value="刪除資料"/>
				</td>
			</form>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
</div>