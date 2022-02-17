<?php
session_start();
$sid=$_GET["student_id"];
include("config.php");
mysql_query('SET NAMES utf8;');

$result = mysql_query("delete  from student where sid=".$sid."")
	or die(mysql_errno());
header('Location: info_student.php');
?>