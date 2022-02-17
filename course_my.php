<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已选课程</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
//session_register("updated");
//session_register("added");
$_SESSION["updated"] = false;
$_SESSION["added"] = false;
$tid=$_SESSION["tid"]; 
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
        <table width="768" border="1" cellspacing="0">
      <tr>
        <td width="54">课程号</td>
        <td width="61">课程名</td>
        <td width="68">人数容量</td>
        <td width="63">报名人数</td>
        <td width="76">地点</td>
        <td width="83">时间</td>
        <td width="68">学分　</td>  
        <td width="94">操作</td>
      </tr>
      <?php 
      include("config.php"); 
      mysql_query('SET NAMES utf8;'); 
		
		$result = mysql_query("select distinct sc_cid,cname,ccapacity,cplace,ctime,ccredit from sc,teacher,course
where tid=c_tid
and sc_cid=cid
and tid=".$tid."
 order by sc_cid");
 
		$result2=mysql_query("select count(distinct sc_cid) from sc,teacher,course
							where tid=c_tid
							and sc_cid=cid
							and tid=".$tid."
							 order by sc_cid");
		list($c_num)=mysql_fetch_array($result2);
 
		
      for($i=0;$i<$c_num;$i++) {
		  list($cid,$cname,$ccapacity,$cplace,$ctime,$ccredit,)=mysql_fetch_array($result);

		   	$result3=mysql_query("
								 select count(sid)
									from sc,course,student,teacher
									where sc_sid=student.sid
									and sc_cid=course.cid
									and course.c_tid=teacher.tid
									and sc_cid=".$cid.";
									");
			list($sign_num)=mysql_fetch_array($result3);
		  echo "
		<tr>
			  <td>".$cid."</td>
			  <td>".$cname." </td>
			  <td>".$ccapacity. "</td>
			  <td>".$sign_num."</td>
			  <td>".$cplace ."</td>
			  <td>".$ctime."</td>
			  <td>".$ccredit."</td>
			  <td><a href=\"score_input.php?course_id=".$cid."\">成绩录入</a></td>
		</tr>";
      }
    ?>
    </table>
  
  </div>
 <?php include("footer.php")?> 
</div>
</body>
</html>