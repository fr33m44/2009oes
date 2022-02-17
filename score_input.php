<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
//session_register("updated");
//session_register("added");
$_SESSION["updated"] = false;
$_SESSION["added"] = false;
$cid=$_GET["course_id"]; 
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
      <form action="score_input_process.php?course_id=<?php echo $cid ?>" method="post">
      <div id="main"> 
        <table width="600" >
      <tr>
        <td width="100">学号</td>
        <td width="100">学生名</td>
        <td width="50">成绩</td>
        <td width="50">科目学分</td>
        <td width="50">所得学分</td>
      </tr>
      <?php 
      include("config.php"); 
      mysql_query('SET NAMES utf8;'); 
      $result2 = mysql_query("select count(sid)
from sc,course,student,teacher
where sc_sid=student.sid
and sc_cid=course.cid
and course.c_tid=teacher.tid
and sc_cid=".$cid."; "); 
	  
      list($stu_num)=mysql_fetch_array($result2);
      $query = "select sid,sname,score,ccredit,credit_get
from sc,course,student,teacher
where sc_sid=student.sid
and sc_cid=course.cid
and course.c_tid=teacher.tid
and sc_cid=".$cid."";     
      $result = mysql_query($query); 
      for($i=0;$i<$stu_num;$i++) {
          list($sid,$sname,$score,$ccredit,$credit_get)=mysql_fetch_array($result);
		  echo "
		  <tr>
			  <td><input type=\"text\" name=\"sid_list[]\" value=\"".$sid."\" size=\"10\" readonly /></td>
			  <td><input type=\"text\" name=\"sname\" value=\"".$sname."\" size=\"10\" readonly /></td>
			  <td><input type=\"text\" name=\"score_list[]\" value=\"".$score."\" size=\"10\" ></input></td>
			  <td><input type=\"text\" name=\"ccredit[]\" value=\"".$ccredit."\"  size=\"10\" readonly ></input></td>
			  <td><input type=\"text\" name=\"credit_get[]\" value=\"".$credit_get."\" size=\"10\"  readonly></input></td>
		  </tr>";
      }
    ?>
    </table>
    <p>
    <input type="submit" value="确认录入"  />
    </p>
  
  </div>
    </form> 
 <?php include("footer.php")?> 
</div>
</body>
</html>