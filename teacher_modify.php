<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改教师信息</title>
<link href="css/style.css" rel="stylesheet" type="text/css" /><br />
<script language="javascript" type="text/javascript" src="js/modify.js"> </script>
<?php
session_start();
//session_register("updated");
$_SESSION["updated"]=false;
?>
<?php
$tid=$_GET["teacher_id"];
?>
</head>

<body>
<div id="container"><?php echo $_SESSION["name"]?>,欢迎进入
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
	<form action="teacher_update.php?teacher_id=<?=$tid?>" name="teacher_modify_form" onsubmit="return(check_teacher_pass())" method="post">
	<?php
	include("config.php");
      mysql_query('SET NAMES utf8;'); 
		$result = mysql_query("select teacher.id,tid,tname,tpass,dname from teacher,dept where teacher.t_did=dept.did and teacher.tid =".$tid.";"); 
		list($id,$tid,$tname,$tpass,$dname)=mysql_fetch_array($result);


	?>
    <table width="500" height="20" border="1" bordercolor="#000000" cellspacing="0">
      <tr>
      	<td width="200">教师序号</td>
        <td><?php echo $id?></td>
      </tr>
      <tr>
      	<td width="200">教师号</td>
        <td><?php if(!isset($_SESSION["aid"])) 
				 echo "<input type=\"text\" name=\"tid\" value=\"$tid\" disabled/>";
                 else echo "<input type=\"text\" name=\"tid\" value=\"$tid\"/>"
                 ?> </td>
      </tr>
      <tr>
      	<td width="200">教师名字</td>
        <td><?php if(!isset($_SESSION["aid"])) 
				 echo "<input type=\"text\" name=\"tname\" value=\"$tname\" disabled />";
				 else echo "<input type=\"text\" name=\"tname\" value=\"$tname\"/>"
				 ?> </td>
      </tr>
      <tr>
      	<td width="200">教师密码</td>
		<td> 
			<?php if(!isset($_SESSION["aid"])) 
				 echo "<input type=\"text\" name=\"tpass\" value=\"$tpass\"  disabled />";
				 else echo "<input type=\"text\" name=\"tpass\" value=\"$tpass\"/>"
				 ?> 
       </td>
 	 </tr>
    <?php if(!isset($_SESSION["aid"]) )  {
	echo ("<tr>
			<td width=\"200\">新密码</td>
			<td> <input type=\"password\" name=\"tpass_new1\" value=\"\" /> </td>
		   </tr>
          ");
	echo ("
		  <tr>
			<td width=\"200\">密码确认</td>
			<td> <input type=\"password\" name=\"tpass_new2\" value=\"\" /> </td>
		   </tr>
		  ");
	}?>
      <tr>
      	<td width="200">所在学院</td>
        <td><select name="t_did" <?php if(!isset($_SESSION["aid"])) echo ("disabled"); ?>>
        		<?php
                $result=mysql_query("select count(dname) as dept_num from dept");
				list($dept_num)=mysql_fetch_array($result);
				$result=mysql_query("select did,dname from dept ");
				for($i=0;$i<$dept_num;$i++)
				{
					list($did,$dname)=mysql_fetch_array($result);
					$result2=mysql_query("select teacher.t_did from teacher,dept where teacher.t_did=dept.did and teacher.tid=".$tid.";");
					list($t_did)=mysql_fetch_array($result2);
					if($t_did===$did)
						echo ("<option value=".$did." selected='selected'>".$dname."</option>");
					else
						echo ("<option value=".$did.">".$dname."</option>");
                }
				?> 
        	</select>
        </td>
      </tr>
      </table>

    <p>
	<?php 
	if($_SESSION["updated"]===true)
	 	echo ("<font color=“red”>更新成功！</font>");
	?>
    </p>
    <p>
      <input type="button" value="返回" onclick="window.location='info_teacher.php'"  style="width:100px;" />
      <input type="submit" value="更新"  style="width:100px;" />
    </p>
    </form>
    </div>
    <div id="footer">
        <?php include("footer.php")?>
    </div>
  </div>
</body>
</html>