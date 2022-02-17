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
$sid=$_SESSION["sid"];
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
        <table width="750" border="1" cellspacing="0">
      <tr>
      	<td width="43">序号</td>
        <td width="53">课程号</td>
        <td width="74">课程名</td>
        <td width="71">人数容量</td>
        <td width="68">已报人数</td>
        <td width="71">地点</td>
        <td width="78">时间</td>
        <td width="54">学分　</td>
        <td width="78">上课老师</td>
        <td width="49">成绩</td>
        <td width="65">所得学分</td>
      </tr>
      <?php 
      include("config.php"); 
      mysql_query('SET NAMES utf8;'); 
      $result = mysql_query("select count(*) from sc where sc_sid=".$sid.""); 
	  
      list($sc_num)=mysql_fetch_array($result);
      $query = "select sc.id,course.cid,course.cname,course.ccapacity,course.cplace,course.ctime,course.ccredit,tname,sc.score,sc.credit_get
from sc,course,student,teacher
where sc_sid=".$sid."
and sc_sid=student.sid
and sc_cid=course.cid
and c_tid=teacher.tid";     
      $result = mysql_query($query); 
      for($i=0;$i<$sc_num;$i++) {
		  
		  
          list($id,$cid,$cname,$ccapacity,$cplace,$ctime,$ccredit,$tname,$score,$credit_get)=mysql_fetch_array($result);
		  $result2=mysql_query("select count(*) from sc where sc_cid=".$cid." ");
		  list($c_num)=mysql_fetch_array($result2);
		  echo "
		<tr>
			  <td>".$id."</td>
			  <td>".$cid."</td>
			  <td>".$cname." </td>
			  <td>".$ccapacity. "</td>
			  <td>".$c_num."</td>
			  <td>".$cplace ."</td>
			  <td>".$ctime."</td>
			  <td>".$ccredit."</td>
			  <td>".$tname."</td> 
			  <td>".$score."</td> 
			  <td>".$credit_get."</td>
		</tr>";
      }
    ?>
    </table>
  
  </div>
 <?php include("footer.php")?> 
</div>
</body>
</html>