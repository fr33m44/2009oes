<?php
	session_start();
	include("config.php");
	$did=$_POST["did"];
	$dname=$_POST["dname"]; 
	$dinfo=$_POST["dinfo"];
?>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("insert into dept(did,dname,dinfo) values ('$did','$dname','$dinfo')")
		or die(mysql_errno());
	header('Location: info_dept.php');
?>