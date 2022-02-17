<?php
	session_start();
	include("config.php");
	$cid=$_POST["cid"];
	$cname=$_POST["cname"];
	$ccapacity=$_POST["ccapacity"];
	$cplace=$_POST["cplace"];
	$ctime=$_POST["ctime"];
	$ccredit=$_POST["ccredit"];
	$c_tid=$_POST["c_tid"];
?>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("insert into course(cid,cname,ccapacity,cplace,ctime,ccredit,c_tid) values ('$cid','$cname','$ccapacity','$cplace','$ctime','$ccredit','$c_tid');")
		or die(mysql_errno());
	//header('Location: info_course.php');
	$_SESSION["added"]=true;
	echo "<script>window.history.back() </script>"; 
?>