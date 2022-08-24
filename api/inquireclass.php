<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>查询班级</title>
	</head>
	<body>
		<div id="queryform" style="font-size: 24px;">
			<form action="inquireclass.php" method="post">
				请输入要查询的班级：<input type="text" name="sid" />
				<input type="submit" name="btn" value="查询" />
			</form>
		</div>
		
		<div id="scoreList">
			<?php
			session_start();
			include("User.php");
			$user=new User($_SESSION['userName'],$_SESSION['userIndent']);
			if(isset($_POST['btn'])){
				$classID=$_POST['sid'];
				$user->scoreClass($classID);
			}
			?>
		</div>
	</body>
</html>
