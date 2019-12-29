<?php
    ini_set("display_errors", "On");//debug message
    require_once "connect.php";
	if(!empty($_SESSION['users']['account']) && !empty($_SESSION['users']['password'])){
		if($_SESSION['users']['admin'] == 1){//if admin
			header("location:welcomadmin.php");
		}else{
			header("location:welcom.php");
		}
	}
?>