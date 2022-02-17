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
      <form action="course_select_process.php" method="post">
      <div id="main"> 
        <table width="717" border="1" cellspacing="0"  >
      <tr>
      	<td width="41">序号</td>
        <td width="58">课程号</td>
        <td width="74">课程名</td>
        <td width="80">人数容量</td>
        <td width="66">已选人数</td>
        <td width="57">地点</td>
        <td width="55">时间</td>
        <td width="53">学分　</td>
        <td width="82">上课老师</td>
        <td width="109">操作</td>
      </tr>
      <?php 
      include("config.php"); 
      mysql_query('SET NAMES utf8;'); 

      $result = mysql_query("Select count(*) as course_num from course"); 
	  
      list($course_num)=mysql_fetch_array($result);
      $query = "select course.id,cid,cname,ccapacity,cplace,ctime,ccredit,tname from course,teacher where course.c_tid=teacher.tid order by course.cid";     
      $result = mysql_query($query); 
      for($i=0;$i<$course_num;$i++) {
          list($id,$cid,$cname,$ccapacity,$cplace,$ctime,$ccredit,$tname)=mysql_fetch_array($result);
		  
		  $result2=mysql_query("select count(*) from sc,course,student,teacher
				where sc_sid=student.sid
				and sc_cid=course.cid
				and course.c_tid=teacher.tid
				and sc_cid=".$cid."");
		list($c_num)=mysql_fetch_array($result2);
          if(isset($_SESSION["aid"]))
		  echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$cid."</td>
			  <td>".$cname." </td>
			  <td>".$ccapacity. "</td>
			  <td>".$c_num. "</td>
			  <td>".$cplace ."</td>
			  <td>".$ctime."</td>
			  <td>".$ccredit."</td>
			  <td>".$tname."</td>
			  <td>
			  <a href=\"course_modify.php?course_id=".$cid."\">修改</a>|
			  	  <!-- <a href=\"course_del.php?course_id=".$cid."\"> -->删除<!-- </a> -->|
				  <a href=\"course_add.php\">添加</a>
			  </td>
		  </tr>";
		  if(isset($_SESSION["sid"]))
		  echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$cid."</td>
			  <td>".$cname." </td>
			  <td>".$ccapacity. "</td>
			  <td>".$c_num. "</td>
			  <td>".$cplace ."</td>
			  <td>".$ctime."</td>
			  <td>".$ccredit."</td>
			  <td>".$tname."</td>
			  <td>
			  <input type=\"checkbox\" name=\"sc_cid[]\" value=\"".$cid."\">选定</input>
			  </td>
		  </tr>";
      }
    ?>
    </table>
    <p>
    <input type="submit" value="确定"  />
    </p>
  
  </div>
    </form> 
 <?php include("footer.php")?> 
</div>
</body>
</html>