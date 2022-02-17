<?php
$did=$_GET["dept_id"];
$did2=$_POST["did"];
$dname=$_POST["dname"];
$dinfo=$_POST["dinfo"]; 

session_start();
include("config.php");
mysql_query("set names utf8;");
$result=mysql_query("update dept set did='$did2' , dname='$dname' , dinfo='$dinfo' where did=".$did."; ")
	or die("Invalid query: " . mysql_error());

$_SESSION["updated"] = true;
header("Location: dept_modify.php?dept_id=".$did2);
?>