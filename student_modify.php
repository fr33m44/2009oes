<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生信息修改</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/modify.js"> </script>
<?php
session_start();
////session_register("updated");
$_SESSION["updated"]=false;
?>
<?php
$sid=$_GET["student_id"];
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
	<form action="student_update.php?student_id=<?=$sid?>" name="student_modify_form" onsubmit="return(check_student_pass())" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 
		$result = mysql_query("select student.id,sid,sname,spass from student,dept where student.s_did=dept.did and student.sid =".$sid." order by student.id"); 
		list($id,$sid,$sname,$spass)=mysql_fetch_array($result);


	?>
    <table width="500" height="20" border="1" bordercolor="#000000" cellspacing="0">
      <tr>
      	<td width="200">序号</td>
        <td><?php echo $id?></td>
      </tr>
      <tr>
      	<td width="200">学号</td>
        <td><?php if(!isset($_SESSION["aid"])) 
				 echo "<input type=\"text\" name=\"sid\" value=\"$sid\" readonly/>";
                 else echo "<input type=\"text\" name=\"sid\" value=\"$sid\"/>"
                 ?></td>
      </tr>
      <tr>
      	<td width="200">学生名字</td>
        <td><?php if(!isset($_SESSION["aid"])) 
				 echo "<input type=\"text\" name=\"sname\" value=\"$sname\" readonly/>";
				 else echo "<input type=\"text\" name=\"sname\" value=\"$sname\"/>"
				 ?></td>
      </tr>
      <tr>
      	<td width="200">密码</td>
        <td> <input type="text" name="spass" value="<?php echo $spass?>"  />
 		</td>
      </tr>
      <tr>
      	<td width="200">所在学院</td>
        <td><select name="s_did" <?php if(!isset($_SESSION["aid"])) echo "disabled"?>>
        		<?php
                $result=mysql_query("select count(dname) as dept_num from dept");
				list($dept_num)=mysql_fetch_array($result);
				$result=mysql_query("select did,dname from dept ");
				for($i=0;$i<$dept_num;$i++)
				{
					list($did,$dname)=mysql_fetch_array($result);
					$result2=mysql_query("select student.s_did from student,dept where student.s_did=dept.did and student.sid=".$sid.";");
					list($s_did)=mysql_fetch_array($result2);
					if($s_did===$did)
						echo ("<option value=\"".$did."\" selected='selected'>".$dname."</option>");
					else
						echo ("<option value=\"".$did."\">".$dname."</option>");
                }
				?> 
        	</select>
        </td>
      </tr>
     <tr>
        <td width="200">总学分</td>
        <?php 
			$credit_get_sum=mysql_query("select sum(credit_get)
						from sc,course,student,teacher
						where sc_sid=student.sid
						and sc_cid=course.cid
						and course.c_tid=teacher.tid
						and sid=20720310307
						");
			list($credit_get_sum)=mysql_fetch_array($credit_get_sum);
		?>
        <td><input type="text" name="credit_get_sum" value="<?php echo $credit_get_sum?>"  readonly /></td>
    </tr>
      </table>

    <p>
	<?php 
	if($_SESSION["updated"]===true)
	 	echo ("<font color=“red”>更新成功！</font>");
	?>
    </p>
    <p>
      
<?php if(isset($_SESSION["aid"])) echo "
    <input type=\"button\" value=\"返回\" onclick=\"window.location='info_student.php'\"  style=\"width:100px;\" />  
	
	";?>
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