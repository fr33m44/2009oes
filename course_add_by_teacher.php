<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加课程</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
$c_tid=$_SESSION["tid"];
$tname=$_SESSION["name"];
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
    <table width="500" height="20" border="1" border="1" cellspacing="0">
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
	  <td width="200">教师号</td>
        <td><input type="text" name="c_tid" readonly value="<?php echo $c_tid?>" /></td>
      </tr>

      </table>

    <p>
      <?php 
	if($_SESSION["added"]===true)
	 	echo ("<font color=“red”>添加成功！</font>");
	?>
	 </p>
    <p>
     <?php if(!isset($_SESSION["aid"])) echo "<input type=\"button\" value=\"返回\" onclick=\"window.history.back()\"  style=\"width:100px;\" />" ?>
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