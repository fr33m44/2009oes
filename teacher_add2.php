<?php
	session_start();
	include("config.php"); 
	$tid=$_POST["tid"];
	$tname=$_POST["tname"];
	$tpass=$_POST["tpass"];
	$t_did=$_POST["t_did"];
?>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("insert into teacher(tid,tname,tpass,t_did) values ('$tid','$tname','$tpass','$t_did');")
		or die(mysql_errno());
	header('Location: info_teacher.php');
?>