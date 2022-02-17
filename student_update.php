<?php
session_start();
$sid_g=$_GET["student_id"];
$sid_p=$_POST["sid"];
$sname=$_POST["sname"];
$spass=$_POST["spass"]; 
$scredit=$_POST["scredit"];
if(isset($_SESSION["aid"]))
	$s_did=$_POST["s_did"];
 
include("config.php");
mysql_query("set names utf8;");
if(!isset($_SESSION["aid"]))
	mysql_query("update student set sid='$sid_p' , sname='$sname' , spass='$spass'  where sid=".$sid_g."; ");
else
	mysql_query("update student set sid='$sid_p' , sname='$sname' , spass='$spass' , s_did='$s_did' where sid=".$sid_g."; ");
	
	
$_SESSION["updated"] = true;
header("Location: student_modify.php?student_id=".$sid_p."");
?>