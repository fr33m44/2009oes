
<?PHP
// 获取用户的登录信息
$u = $_POST["username"];
$p = $_POST["password"];
$i = $_POST["identity"];
include("config.php");

//检查用户名是否存在
switch($i) {
	case "student":
    $query = "Select * from ".$i." where sid ='$u'";
	mysql_query("set names utf8;");
    $result = mysql_query($query); 
    if ($row = mysql_fetch_array($result)){ 	
			//检查密码是否正确
			if ($row["spass"] == $p){
				session_start();// 启动会话
				session_unset();//删除会话
			    session_destroy();
			    ////session_register("spass");  //创建会话变量，保存密码
				$_SESSION["spass"] = $p;
				////session_register("sid");  
				$_SESSION["sid"] = $u;
				////session_register("name");  //保存用户名
                $_SESSION["name"] = $row["sname"];
			    header("Location: index_student.php");
			}
			else{
		        // 输出登录错误信息
		       makeform($incorrectLogin);
			}
	}
   // 如果用户名不存在
   else{
		// 检查用户是否输入用户名
		if ($u == ""){	
			makeform("");  //重新显示登录表单
		}
		else {  //如果输入了，则提示用户名输入错误
			makeform($incorrectLogin);
		}
	} break;
	case "teacher":
    $query1 = "Select * from "."teacher where tid ='$u'";
	mysql_query("set names utf8;");
    $result1 = mysql_query($query1); 
    if ($row = mysql_fetch_array($result1)){ 	
			//检查密码是否正确
			if ($row["tpass"] == $p){
				session_start();// 启动会话
				//session_unset();//删除会话
			    //session_destroy();
			    ////session_register("tpass");  //创建会话变量，保存密码
				$_SESSION["tpass"] = $p;
				////session_register("tid");
				$_SESSION["tid"] = $u;
				////session_register("name");  //保存用户名
				$_SESSION["name"] = $row["tname"];
			    header("Location: index_teacher.php");
			}
			else{
		        // 输出登录错误信息
		       makeform($incorrectLogin);
			}
	}
   // 如果用户名不存在
   else{
		// 检查用户是否输入用户名
		if ($u == ""){	
			makeform("");  //重新显示登录表单
		}
		else {  //如果输入了，则提示用户名输入错误
			makeform($incorrectLogin);
		}
	} break;
	case "admin":
	$query = "select * from ".$i." where aname ='$u'";
	mysql_query("set names utf8;");
    $result = mysql_query($query); 
    if ($row = mysql_fetch_array($result)){ 	
			//检查密码是否正确
			if ($row["apass"] == $p){
				session_start();// 启动会话
				//session_unset();//删除会话
			    //session_destroy();
			    ////session_register("apass");  //创建会话变量，保存密码
				$_SESSION["apass"] = $p;
			    ////session_register("aid");  //创建会话变量，保存密码
				$_SESSION["aid"] = $u;
				////session_register("name");  //保存用户名
				$_SESSION["name"] = $u;
			    header("Location: index_admin.php");
			}
			else{
		        // 输出登录错误信息
		       makeform($incorrectLogin);
			}
	}
   // 如果用户名不存在
   else{
		// 检查用户是否输入用户名
		if ($u == ""){	
			makeform("");  //重新显示登录表单
		}
		else {  //如果输入了，则提示用户名输入错误
			makeform($incorrectLogin);
		}
	} break;
		
}

//显示登录表单的函数
// ....m($errormessage="", ... indicates an optionale argument for this function, same for $username.
function makeform($errormessage="", $username2 = ""){

//	echo $errormessage;
// First we check if the errormessage variable is empty, if it is. we print the error message
if ($errormessage != ""){echo "<font color=\"#FF0000\"><strong>$errormessage</strong></font><br>";}

	echo "$username2";
	if ($username2 != ""){echo "DISABLED";}

	} 
?>