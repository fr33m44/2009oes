<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线选课系统【Online Elective System】-登录</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<?php include("header.php")?>
    <div id="loginform">
    <form method="post" action="login.php">
      <p>用户名：
        <input type="text" name="username" id="username" size="20"/>
      </p>
      <p>密&nbsp;&nbsp;&nbsp;&nbsp;码：
        <input type="password" name="password" id="password" size="21"/>
      </p>
      <p>登录身份：<input name="identity" type="radio" value="student" checked />
      学生      <input name="identity" type="radio" value="teacher"  /> 
      教师 <input name="identity" type="radio" value="admin"  /> 管理员 </p>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="image" name="ibtnLogin" id="ibtnLogin" src="img/login_btn.png" style="border-width:0px;" />
      </p>
    </form>
    </div> 
<div id="footer">
	<?php include("footer.php")?>
</div>
</div>
</body>
</html>