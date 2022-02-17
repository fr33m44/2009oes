<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生管理</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/modify.js">
</script>
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
      	<div id="main"> 
        <table width="750" border="1" cellspacing="0">
      <tr>
        <td width="63">序号</td>
        <td width="143">学号</td>
        <td width="91">名字</td>
        <td width="81">密码</td>
        <td width="66">学分</td>
        <td width="154">所在院校</td>
        <td width="122">操作</td>
      </tr>
      <?php 
      include("config.php");
      mysql_query('SET NAMES utf8;');
	  $query="select count(*) as student_num from student";
      $result = mysql_query($query); 
      list($student_num)=mysql_fetch_array($result);
      $query = "select student.id,sid,sname,spass,dname from student,dept where dept.did=student.s_did order by student.id";     
      $result = mysql_query($query); 
      for($i=0;$i<$student_num;$i++) {
		  
          list($id,$sid,$sname,$spass,$dname)=mysql_fetch_array($result);
		$credit_get_sum=mysql_query("select sum(credit_get)
			from sc,course,student,teacher
			where sc_sid=student.sid
			and sc_cid=course.cid
			and course.c_tid=teacher.tid
			and sid='$sid'
			");
			list($credit_get_sum)=mysql_fetch_array($credit_get_sum);

          echo "
		  <tr>
			  <td>".$id."</td>
			  <td>".$sid." </td>
			  <td>".$sname. "</td>
			  <td>".$spass."</td> 
			  <td>".$credit_get_sum."</td>
			  <td>".$dname."</td>			  
			  <td><a href=\"student_modify.php?student_id=".$sid."\">修改</a>|
			  	  <!-- <a href=\"student_del.php?student_id=".$sid."\"> -->删除<!-- </a> -->|
				  <a href=\"student_add.php\">添加</a></td>

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