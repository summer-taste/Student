<?php
/**用户登录接口*/
session_start();
include("dbconnect.php");

//获取表单数据
$userName=$_POST['username'];
$userPing=md5($_POST['userping']);

$sqls="select username,userping,userindent
from user_info
where username='{$userName}'
and userping='{$userPing}'";
$rs=mysqli_query($conn,$sqls);
if($rs && mysqli_num_rows($rs)>0){
	$userInfo=mysqli_fetch_array($rs);
	$_SESSION['userName']=$userInfo['username'];
	$_SESSION['userIndent']=$userInfo['userindent'];
	echo "<script>
	alert('登录成功，欢迎使用学生学籍信息管理系统！');
	location.href='../managent.php';
	</script>";
}else{
	echo "<script>
	alert('登录失败，请检查用户名或密码是否正确！');
	location.href='../index.php';
	</script>";
}

?>