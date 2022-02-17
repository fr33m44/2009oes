<?php
$cid=$_GET["course_id"];
$cid2=$_POST["cid"];
$cname=$_POST["cname"];
$ccapacity=$_POST["ccapacity"];
$cplace=$_POST["cplace"];
$ctime=$_POST["ctime"];
$ccredit=$_POST["ccredit"];
$c_tid=$_POST["c_tid"];
session_start();
include("config.php");
//update course set ccapacity=21 ,ctime='tueday 3-4'  where id=2;
mysql_query("set names utf8;");
$result=mysql_query("update course set cid='$cid2' , cname='$cname',ccapacity='$ccapacity',cplace='$cplace',ctime='$ctime',ccredit='$ccredit',c_tid='$c_tid' where cid='$cid' ");
//if($result)
//{
	////session_register("updated");  //创建会话变量，保存密码
$_SESSION["updated"] = true;
header("Location: course_modify.php?course_id=".$cid2);
	//echo ("upadte ok!");
	//list($cid,$cname,$ccapacity,$cplace,$ctime,$ccredit) = mysql_fetch_array($result);
//}
?>