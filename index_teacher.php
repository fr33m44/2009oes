<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教师首页</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
</head>

<body>
<div id="container">
	<?php echo $_SESSION['name']?>,欢迎进入<?php include("header.php")?>
	<?php include("nav_teacher.php")?>
	<div id="main">
    </div>
	<?php include("footer.php")?>
</div>
</body>
</html>