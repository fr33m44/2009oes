<?php
session_start();
$cid=$_GET["course_id"];
include("config.php");
mysql_query('SET NAMES utf8;');

$result = mysql_query("delete  from course where id=".$cid."")
	or die(mysql_errno());
header('Location: info_course.php');
?>