<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教师管理</title>
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
        <table width="656" border="1" cellspacing="0" >
      <tr>
        <td width="40">序号</td>
        <td width="100">教师号</td>
        <td width="77">教师名</td>
        <td width="136">教师密码</td>
        <td width="180">所在学院</td>
        <td width="130">操作</td>
      </tr>
      <?php 
      include("config.php");
      mysql_query('SET NAMES utf8;');
	  $query="select count(*) as teacher_num from teacher";
      $result = mysql_query($query); 
      list($teacher_num)=mysql_fetch_array($result);
      $query = "select teacher.id,tid,tname,tpass,dname from teacher,dept where teacher.t_did=dept.did order by teacher.id";     
      $result = mysql_query($query); 
      for($i=0;$i<$teacher_num;$i++) {
          list($id,$tid,$tname,$tpass,$dname)=mysql_fetch_array($result);
          echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$tid." </td>
			  <td>".$tname. "</td>
			  <td>".$tpass."</td
			  ><td>".$dname."</td>
			  <td><a href=\"teacher_modify.php?teacher_id=".$tid."\">修改</a>|
			  	  <!-- <a href=\"teacher_del.php?teacher_id=".$tid."\"> -->删除<!-- </a> -->|
				  <a href=\"teacher_add.php\">添加</a></td>
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