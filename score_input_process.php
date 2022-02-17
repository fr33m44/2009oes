
<?php
session_start();
$cid=$_GET["course_id"]; 
$sid_list=$_POST["sid_list"];
$score_list=$_POST["score_list"]; 
$ccredit=$_POST["ccredit"];
$tid=$_SESSION["tid"];
include("config.php");
mysql_query("set names utf8;");
$result2=mysql_query("select count(sid)
from sc,course,student,teacher
where sc_sid=student.sid
and sc_cid=course.cid
and course.c_tid=teacher.tid
and sc_cid='$cid'
and tid='$tid'
");
list($sel_num)=mysql_fetch_array($result2);




//validate the score,the score can only range from 0 to 100;
for($j=0;$j<count($score_list);$j++)
{
	if($score_list[$j]>100 || $score_list[$j] < 0){
		echo "<script>alert(\"分数只能在0到100之间！\")</script>";
		echo "<script>history.back()</script>";
		}
} 

for($i=0;$i<$sel_num;$i++)
{
	if($score_list[$i]<60)
		$credit_get[$i]=0;
	if($score_list[$i]>=60 && $score_list[$i]<70)
		$credit_get[$i]=$ccredit[$i] * 0.7;
	if($score_list[$i]>=70 && $score_list[$i]<80)
		$credit_get[$i]=$ccredit[$i] * 0.8;
	if($score_list[$i]>=80 && $score_list[$i]<90)
		$credit_get[$i]=$ccredit[$i] * 0.9;
	if ($score_list[$i]>=90 && $score_list[$i]<=100)
		$credit_get[$i]=$ccredit[$i];
	$result=mysql_query("update sc set score='$score_list[$i]',credit_get='$credit_get[$i]'
						where sc_cid='$cid'
						and sc_sid='$sid_list[$i]'
						")
	or die("Invalid query: " . mysql_error());
	
}

$_SESSION["updated"] = true;
header("Location: score_input.php?course_id=".$cid."");
?>