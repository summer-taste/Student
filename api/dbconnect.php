<?
session_start();
//连接数据库服务器
$dbServer="127.0.0.1";		//本地MYSQL服务器地址
$dbUser="root";				//登录MYSQL的用户名
$dbPing="root";				//登录MYSQL的用户密码
$conn=mysqli_connect($dbServer,$dbUser,$dbPing);	//连接登录MYSQL	
if($conn){
	mysqli_select_db($conn,"stu_score");
}else{
	echo "<script>
	alert('数据库连接失败');
	location.href='../index.php';
	</script>";
}
?>