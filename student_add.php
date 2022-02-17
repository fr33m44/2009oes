<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加学生信息</title>
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
	<form action="student_add2.php" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 


	?>
    <table width="500" height="20" border="1" bordercolor="#000000" cellspacing="0">
      <tr>
      	<td width="200">学号</td>
        <td><input type="text" name="sid" value="" /> </td>
      </tr>
      <tr>
      	<td width="200">学生名字</td>
        <td><input type="text" name="sname" value="" /></td>
      </tr>
      <tr>
      	<td width="200">密码</td>
        <td><input type="text" name="spass" value="" /></td>
      </tr>
	   <tr>
      	<td width="200">学分</td>
        <td><input type="text" name="scredit" value=0 /></td>
      </tr>

      <tr>
      	<td width="200">所在学院</td>
        <td><select name="s_did">
        		<?php
                $result=mysql_query("select count(dname) as dept_num from dept");
				list($dept_num)=mysql_fetch_array($result);
				$result=mysql_query("select did,dname from dept ");
				for($i=0;$i<$dept_num;$i++)
				{
					list($did,$dname)=mysql_fetch_array($result);
					$result2=mysql_query("select student.s_did from student,dept where student.s_did=dept.did and student.id=".$id.";");
					list($s_did)=mysql_fetch_array($result2);
					echo ("<option value=".$did.">".$dname."</option>");
                }
				?> 
        	</select>
        </td>
      </tr>
      </table>

    <p>
	 </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_student.php'"  style="width:100px;" />
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