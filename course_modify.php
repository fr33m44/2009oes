<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMS 管理员首页 修改课程信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
<?php
$cid=$_GET["course_id"];
?>
</head>

<body> 
<div id="container">
		<?php echo $_SESSION["name"]?>,欢迎进入
		<?php include("header.php")?> 
		<?php include("nav_admin.php")?>  
	<div id="main">
	<form action="course_update.php?course_id=<?=$cid?>" method="post">
	<?php
	include("config.php");
	mysql_query("set names utf8");
	$result=mysql_query("select cid,cname,ccapacity,cplace,ctime,ccredit,c_tid from course where cid =".$cid.";");
	list($cid,$cname,$ccapacity,$cplace,$ctime,$ccredit,$c_tid)=mysql_fetch_array($result);

	?>
    <table width="500" height="20" border="1" cellspacing="0">
      <tr>
      	<td width="200">课程号</td>
        <td><input type="text" name="cid" value="<?php echo $cid?>" /></td>
      </tr>
      <tr>
      	<td width="200">课程名</td>
        <td><input type="text" name="cname" value="<?php echo $cname?>" /> </td>
      </tr>
      <tr>
      	<td width="200">人数</td>
        <td><input type="text" name="ccapacity" value="<?php echo $ccapacity?>" /></td>
      </tr>
      <tr>
      	<td width="200">地点</td>
        <td><input type="text" name="cplace" value="<?php echo $cplace?>" /></td>
      </tr>
      <tr>
      	<td width="200">时间</td>
        <td><input type="text" name="ctime" value="<?php echo $ctime?>" /></td>
      </tr>
      <tr>
      	<td width="200">学分</td>
        <td><input type="text" name="ccredit" value="<?php echo $ccredit?>" /></td>
      </tr>
      <tr>
      	<td width="200">上课老师</td>
        <td><select name="c_tid">
        		<?php
                $result=mysql_query("select count(*) as teacher_num from teacher");
				list($teacher_num)=mysql_fetch_array($result);
				$result=mysql_query("select tid,tname from teacher ");
				for($i=0;$i<$teacher_num;$i++)
				{
					list($tid,$tname)=mysql_fetch_array($result);
					$result2=mysql_query("select course.c_tid from course,teacher where course.c_tid=teacher.tid and course.cid=".$cid.";");
					list($c_tid)=mysql_fetch_array($result2);
					if($c_tid===$tid)
						echo ("<option value=".$tid." selected='selected'>".$tname."</option>");
					else
						echo ("<option value=".$tid.">".$tname."</option>");
                }
				?> 
        	</select></td>
      </tr>
      </table>

    <p>
	<?php 
	if($_SESSION["updated"]===true)
	 	echo ("<font color=“red”>更新成功！</font>");
	?>
    </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_course.php'"  style="width:100px;" />
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