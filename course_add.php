<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加课程</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
</head>

<body>
 <div id="container">
		<?php echo $_SESSION["name"]?>,欢迎进入
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
	<form action="course_add2.php" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 


	?>
    <table width="500" height="20" border="1" cellspacing="0">
        <tr>
            <td width="200">课程号</td>
            <td><input type="text" name="cid" value="" /></td>
        </tr>
      <tr>
        <td width="200">课程名</td>
        <td><input type="text" name="cname" value="" /></td>
      </tr>
      <tr>
      	<td width="200">人数</td>
        <td><input type="text" name="ccapacity" value="" /></td>
      </tr>
      <tr>
      	<td width="200">地点</td>
        <td><input type="text" name="cplace" value="" /></td>
      </tr>
	  <tr>
      	<td width="200">时间</td>
        <td><input type="text" name="ctime" value="" /></td>
      </tr>
	  <tr>
      	<td width="200">学分</td>
        <td><input type="text" name="ccredit" value="" /></td>
      </tr>
 	  <tr>
	  <td width="200">上课老师</td>
        <td>
     	
        <select name="c_tid"  ?>>
        		<?php
                $result=mysql_query("select count(*) as teacher_num from teacher");
				list($teacher_num)=mysql_fetch_array($result);
				$result=mysql_query("select tid,tname from teacher ");
				for($i=0;$i<$teacher_num;$i++)
				{
					list($tid,$tname)=mysql_fetch_array($result);
					$result2=mysql_query("select course.cid from teacher,course where course.c_tid=teacher.tid and teacher.tid=".$tid."; ");
					list($c_tid)=mysql_fetch_array($result2);
					if($c_tid === $tid)
						echo ("<option value=".$tid." selected>".$tname."</option>");
					else 
						echo ("<option value=".$tid." >".$tname."</option>");
                }
				?> 
        	</select>
        </td>
      </tr>

      </table>

    <p>
      <?php 
	if($_SESSION["added"]===true)
	 	echo ("<font color=“red”>添加成功！</font>");
	?>
	 </p>
    <p>
     <?php if(!isset($_SESSION["aid"])) echo "<input type=\"button\" value=\"返回\" onclick=\"window.location='info_course.php'\"  style=\"width:100px;\" />" ?>
      <input type="submit" value="添加" style="width:100px;" />
    </p>
    </form>
  	</div>
    <div id="footer">
        <?php include("footer.php")?>
    </div>
 </div>
</body>
</html>