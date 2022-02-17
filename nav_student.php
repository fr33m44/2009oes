<?php 
	$sid=$_SESSION["sid"];
?>
<div id="nav"> 
<ol>
        <li><a href="index_student.php">首页</a></li>
        <li><a href="info_course.php">可选课程</a></li>
        <li><a href="course_selected.php">已选课程</a></li>
        <li><a href="student_modify.php?student_id=<?php echo $sid?>">个人信息</a></li>
        <li><a href="logout.php">退出</a></li>
</ol>
</div>