<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员首页</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start(); 
//($_SESSION["name"] === "student" || $_SESSION["name"]=== "teacher" $_SESSION["name"]=== "admin")
if (!isset($_SESSION["name"])){ 
    $_SESSION["name"] = null; 
    die("您无权访问 请从<a href=\"index.php\" >主页登陆 </a>"); 
} 
?>

</head>

<body>
<div id="container">
	<?php echo $_SESSION["name"]?>,欢迎进入
	<?php include("header.php")?>
	<?php include("nav_admin.php")?>
	<div id="main"></div>
</div id="footer">
	<?php include("footer.php")?>
</div>
</body>
</html>