<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
//session_register("updated"); 
//session_register("deleted");
//session_register("added");
$_SESSION["updated"] = false;
$_SESSION["deleted"] = false;
$_SESSION["added"] = false;
?>
</head>

<body>
<div id="container">
	<?php echo $_SESSION["name"]?>,欢迎进入
	<?php include("header.php")?>
		<?php include("nav_admin.php")?>
        
        	<div id="main"> 
        <table width="674" border="1" cellspacing="0">
      <tr>
        <td width="60">序号</td>
        <td width="129">管理员号</td>
        <td width="157">名称</td>
        <td width="153">密码</td>
        <td width="153">操作</td>
        </tr>
      <?php 
      include("config.php");
      $query = "Select count(*) as admin_num from admin";
      mysql_query('SET NAMES utf8;'); 
      $result = mysql_query($query); 
      list($admin_num)=mysql_fetch_array($result);
      $query = "Select * from admin";     
      $result = mysql_query($query); 
      for($i=0;$i<$admin_num;$i++) {
          list($id,$aid,$aname,$apass)=mysql_fetch_array($result);
          echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$aid." </td>
			  <td>".$aname. "</td>
			  <td>".$apass ."</td>
			  <td><a href=\"admin_modify.php?admin_id=".$aid."\">修改</a>|
			  	  <a href=\"admin_del.php?admin_id=".$aid."\">删除</a>|
				  <a href=\"admin_add.php\">添加</a>
		      </td>

		  </tr>";
      }
    ?>
    </table>
    </div>
</div id="footer">
        <?php include("footer.php")?>
    </div>
</div>
</body>
</html>