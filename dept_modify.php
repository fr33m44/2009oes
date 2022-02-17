<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学院信息修改</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
<?php
$did=$_GET["dept_id"];
?>
</head>

<body>
<div id="container"> 
		<?php echo $_SESSION["name"]?>,欢迎进入
      <?php include("header.php")?> 
		<?php include("nav_admin.php")?>
  	<div id="main">
	<form action="dept_update.php?dept_id=<?=$did?>" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 
		$result = mysql_query("select id,did,dname,dinfo from dept where dept.did =".$did." order by dept.id"); 
		list($id,$did,$dname,$dinfo)=mysql_fetch_array($result);


	?>
    <table width="500" height="20" border="1" cellspacing="0">
      <tr>
      	<td width="200">序号</td>
        <td><?php echo $id?></td>
      </tr>
      <tr>
      	<td width="200">学院号</td>
        <td><input type="text" name="did" value="<?php echo $did?>" /> </td>
      </tr>
      <tr>
      	<td width="200">学院名字</td>
        <td><input type="text" name="dname" value="<?php echo $dname?>" /></td>
      </tr>
      <tr>
      	<td width="200">学院简介</td>
        <td><textarea rows="10" cols="20" name="dinfo"><?php echo $dinfo?></textarea></td>
      </tr>

      </table>

    <p>
	<?php 
	if($_SESSION["updated"]===true)
	 	echo ("<font color=“red”>更新成功！</font>");
	if($_SESSION["added"]===true)
	 	echo ("<font color=“red”>添加！</font>");	?>
    </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_dept.php'"  style="width:100px;" />
      <input type="submit" value="更新" style="width:100px;" />
    </p>
    </form>
    </div>
    <div id="footer">
        <?php include("footer.php")?>
    </div>
</div>
</body>
</html>