
<?php
$tid=$_GET["teacher_id"];
$tid2=$_POST["tid"];
$tname=$_POST["tname"];
$tpass=$_POST["tpass"];
$tpass_new1=$_POST["tpass_new1"];
$t_did=$_POST["t_did"];

session_start();
include("config.php");
mysql_query("set names utf8;");
$result=mysql_query("update teacher set tid='$tid2' , tname='$tname' , tpass='$tpass_new1' , t_did='$t_did' where tid=".$tid."; ")
	or die("Invalid query: " . mysql_error());

$_SESSION["updated"] = true;
header("Location: teacher_modify.php?teacher_id=".$tid2);
?>