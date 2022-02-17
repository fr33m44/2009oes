<?php
	session_start();
	include("config.php");
	$sid=$_POST["sid"];
	$sname=$_POST["sname"];
	$spass=$_POST["spass"];
	$scredit=$_POST["scredit"];
	$s_did=$_POST["s_did"];
?>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("insert into student(sid,sname,spass,scredit,s_did) values ('$sid','$sname','$spass','$scredit','$s_did');")
		or die(mysql_errno());
	header('Location: info_student.php');
?>