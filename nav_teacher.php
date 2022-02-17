<?php 
	$tid=$_SESSION["tid"];
?>
<div id="nav">
    <ol> 
        <li><a href="index_teacher.php">首页</a></li>
        <li><a href="course_my.php">我的课程</a></li>
        <li><a href="course_add_by_teacher.php">课程添加</a></li>
        <li><a href="teacher_modify.php?teacher_id=<?php echo $tid?>">个人信息</a></li>
        <li><a href="logout.php">退出</a></li>
    </ol>
</div>
