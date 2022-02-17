<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改教师信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
//session_register("updated");
$_SESSION["updated"]=false;
?>
<?php
$aid=$_GET["admin_id"];
?>
</head>

<body>
<div id="container"><?php echo $_SESSION["name"]?>,欢迎进入
 <?php include("header.php")?>
      <?php
	  if(isset($_SESSION["sid"]))
	  	include("nav_student.php");
	  if(isset($_SESSION["aid"]))
	  	include("nav_admin.php");
	  if(isset($_SESSION["tid"]))
		include("nav_teacher.php");
	  ?>
    
    
    	<div id="main">
	<form action="admin_update.php?admin_id=<?=$aid?>" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;');  
		$result = mysql_query("select * from admin where id =".$aid.";"); 
		list($id,$aid,$aname,$apass)=mysql_fetch_array($result);


	?>
    <table width="500" height="20" border="1" cellspacing="0">
      <tr>
      	<td width="200">序号</td>
        <td><?php echo $id?></td>
      </tr>
      <tr>
      	<td width="200">管理员号</td>
        <td><input type="text" name="aid" value="<?php echo $aid?>" /> </td>
      </tr>
      <tr>
      	<td width="200">名称</td>
        <td><input type="text" name="aname" value="<?php echo $aname?>" /></td>
      </tr>
      <tr>
      	<td width="200">密码</td>
        <td><input type="text" name="apass" value="<?php echo $apass?>" /></td>
      </tr>
      </table>

    <p>
	<?php 
	if($_SESSION["updated"]===true)
	 	echo ("<font color=“red”>更新成功！</font>");
	?>
    </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_admin.php'"  style="width:100px;" />
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