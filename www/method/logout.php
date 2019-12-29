<?php
    session_start();
    unset($_SESSION["users"]);// no return
	echo "<script>
		alert('登出！');
		document.location.href='../index.php';
		</script>";
 ?>