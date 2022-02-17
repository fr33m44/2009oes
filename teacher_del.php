<?php
session_start();
$tid=$_GET["teacher_id"];
include("config.php");
mysql_query('SET NAMES utf8;');

$result = mysql_query("delete  from teacher where tid=".$tid."")
	or die(mysql_errno());
header('Location: info_teacher.php');
?>