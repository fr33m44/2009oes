 
<?php
session_start();
$sc_cid=$_POST["sc_cid"];  
$sid=$_SESSION["sid"];

include("config.php"); 
mysql_query('SET NAMES utf8;');    
for($i=0;$i<count($sc_cid);$i++)
{ 	
	$result=mysql_query("select count(*) from sc where sc_sid='$sid' and sc_cid='$sc_cid[$i]' ");
	list($selected_num)=mysql_fetch_array($result);
	if($selected_num == 1)
		{
			echo ("选定的课程不能重复选择！请<a href=\"info_course.php\" >返回</a>重新选择！");
			break;
		}
		
	
	else 
	{
		mysql_query("insert into sc(sc_cid,sc_sid) values('$sc_cid[$i]','$sid');");
		 echo "<script>alert(\"选定成功！\")</script>"; 
		 echo "<script>window.history.back() </script>"; 
	}
	 
}
if($c_num>=$ccapacity){
	 echo "<script>alert(\"选定科目人数已达上限，请重新其他科目！\")</script>"; 
	 echo "<script>window.history.back() </script>"; 
	} 
//header('Location: info_course.php');
?> 

