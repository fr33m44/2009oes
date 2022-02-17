<?php
$id=$_GET["admin_id"];
$aid=$_POST["aid"];
$aname=$_POST["aname"];
$apass=$_POST["apass"]; 

session_start();
include("config.php");
mysql_query("set names utf8;");
$result=mysql_query("update admin set aid='$aid' , aname='$aname' , apass='$apass'  where id=".$id."; ")
	or die("Invalid query: " . mysql_error());

$_SESSION["updated"] = true;
header("Location: admin_modify.php?admin_id=".$id);
?>