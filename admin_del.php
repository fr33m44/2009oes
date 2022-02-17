 <?php
session_start();
$aid=$_GET["admin_id"];
include("config.php");
mysql_query('SET NAMES utf8;');

$result = mysql_query("delete  from admin where id=".$aid."")
	or die(mysql_errno());
header('Location: info_admin.php');
?>