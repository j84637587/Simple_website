<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>主頁</title>
  </head>
  <body>
	<!--頁頭-->
    <header>
      <div class="content-wrapper">
        <div class="float-left">
          <p class="site-title"></p>
          <h4 style="margin-top: 5%;">主頁</h4>
        </div>
      </div>
    </header>
    <!--置中 上30左50-->
    <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%;">
    <a href="./login.html">
	  <h2 style="margin-top:20px;font-size: 30px;">登入</h2>
    </a> 
    <a href="./register">
	  <h2 style="margin-top:20px;font-size: 30px;">註冊</h2>
    </a> 
	<?php
        session_start();
        if(!empty($_SESSION['users']['account'])){
			require_once "session_ckeck.php";
		}
    ?>
	</div>
  </body>
</html>
