<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加学院信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
</head>

<body> 
<div id="container">
		<?php echo $_SESSION["name"]?>,欢迎进入
      <?php include("header.php")?> 
		<?php include("nav_admin.php")?>
	<div id="main">
        <div id="title">添加学院信息</div>
	<form action="dept_add2.php" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 


	?>
	<table width="500" height="20" border="1" cellspacing="0">
	  <tr>
	    <td width="200">学院号</td>
	    <td><input type="text" name="did" value="" /></td>
      </tr>
	  <tr>
	    <td width="200">学院名字</td>
	    <td><input type="text" name="dname" value="" /></td>
      </tr>
	  <tr>
	    <td width="200">学院简介</td>
	    <td><input type="text" name="dinfo" value="" /></td>
      </tr>
	  </table>
	<p>
	  </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_dept.php'"  style="width:100px;" />
      <input type="submit" value="添加" style="width:100px;" />
    </p>
    </form>
	<?php 
	if($_SESSION["added"]===true)
	 	echo ("<font color=“red”>添加成功！</font>");
	?>

    </div>
    <div id="footer">
        <?php include("footer.php")?>
    </div>
</div>
</body>
</html>