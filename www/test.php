<?php
session_start();
IF($_POST['nickname']!=''){
 $_SESSION['nickname']=$_POST['nickname'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>簡易SESSION建置</title>
</head>

<body>
<p>簡易SESSION應用 </p>
<form id="form1" name="form1" method="post" action="p7-1.php">
  <p>您的暱稱：
    
    <input type="text" name="nickname" id="nickname" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="送出" />
  </p>
</form>
<?php
echo "您先前輸入的暱稱為：".$_SESSION['nickname'];
?>
<p>&nbsp;</p>
</body>
</html>