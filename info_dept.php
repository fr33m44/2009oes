<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学院信息管理</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
//session_register("updated");  //创建会话变量，保存密码
$_SESSION["updated"] = false;
$_SESSION["added"] = false;
?>
</head>

<body>
<div id="container">
	<?php echo $_SESSION["name"]?>,欢迎进入
	<?php include("header.php")?>
		<?php include("nav_admin.php")?>
    
    	<div id="main"> 
        <table width="650" border="1" cellspacing="0">
      <tr>
        <td width="60">序号</td>
        <td width="150">学院号</td>
        <td width="127">学院名字</td>
        <td width="175">学院简介　</td>
        <td width="116">操作</td>
      </tr>
      <?php 
      include("config.php");
      $query = "Select count(*) as course_num from dept";
      mysql_query('SET NAMES utf8;'); 
      $result = mysql_query($query); 
      list($course_num)=mysql_fetch_array($result);
      $query = "Select * from dept";     
      $result = mysql_query($query); 
      for($i=0;$i<$course_num;$i++) {
          list($id,$did,$dname,$dinfo)=mysql_fetch_array($result);
          echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$did." </td>
			  <td>".$dname. "</td>
			  <td>".$dinfo ."</td>
			  <td><a href=\"dept_modify.php?dept_id=".$did."\">修改</a>|
				  <a href=\"dept_add.php\">添加</a></td>
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