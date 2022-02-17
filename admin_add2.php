<?php
	session_start();
	include("config.php");
	$aid=$_POST["aid"];
	$aname=$_POST["aname"];
	$apass=$_POST["apass"]; 
?>
<?php
	mysql_query("set names utf8");
	$result = mysql_query("insert into admin(aid,aname,apass ) values ('$aid','$aname','$apass' );")
		or die(mysql_errno());
	header('Location: info_admin.php');
?>