<?php
session_start();
if(!isset($_SESSION['userName']) || $_SESSION['userName']==''){
	echo "<script>
	alert('您尚未登录，请先登录系统');
	location.href='index.php';
	</script>";
}

?>
<html>
	<head>
		<title>学生学籍信息管理系统</title>
		<style type="text/css">
			#mainBox{
				width: 100%;
				height: 942px;
				display: flex;
				flex-direction: row;
			}
			#leftColumn{
				width: 20%;
				height: 943px;
				background-color: #6495ED;
				color: white;
			}
			#rightColumn{
				width: 85%;
				height: 600px;
				background-color: white;
			}
			#rightTop{
				height: 60px;
				background: cornflowerblue;
				font-size: 40px;
				font-family: "楷体";
				color: white;
				text-align: center;
				line-height: 60px;
				padding-right:20px;
			}
			#userinfo{
				font-size: 20px;
				display: flex;
				flex-direction: column;
				text-align: center;
				margin: 50px 0 0 0;
			}
			#userpic{
				width: 80px;
				height: 80px;
				border-radius: 80px;
				background: url(asset/66.jpg);
				margin: 10px auto;
			}
			#menu{
				text-align: center;
				margin-top: 50px;
			}
			#menu a{
				font-size: 20px;
				text-decoration: none;
				line-height: 45px;
				color: white;
			}
			#menu a:hover{
				background-color: #0055AA;
			}
		</style>
	</head>
	<body>
		<?php
			include("api/User.php");
			$User=new User($_SESSION['userName'],$_SESSION['userIndent']);
		?>
		<div id="mainBox">
			<!-- 左侧栏 -->
			<div id="leftColumn">
				<!-- 用户信息栏 -->
				<div id="userinfo">
					<div id="userpic"></div>
					<div id="username">
					<?php
						echo "欢迎您".$_SESSION['userName'];
						echo "<br>";
						echo "<a href='loginout.php'>注销退出</a>"
					?>
					</div>
				</div>
				<!-- 菜单栏 -->
				<div id="menu">
					<?php
						$User->menuShow();
					?>
				</div>
			</div>
			<!-- 右侧栏 -->
			<div id="rightColumn">
				<!-- 上部 -->
				<div id="rightTop">
					学生学籍信息管理系统
				</div>
				<!-- 下部：内容区,main -->
				<div id="main">
					<iframe name="dataArea" width="1540px" height="880px" scrolling="no"></iframe>
				</div>
			</div>
		</div>
	</body>
</html>