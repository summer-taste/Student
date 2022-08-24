<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>删除用户账号信息</title>
	</head>
	<body>
		<div id="queryform" style="font-size: 24px;">
			<form action="delete.php" method="post">
				请输入要删除的用户名称：<input type="text" name="sid" />
				<input type="submit" name="btn" value="执行" />
			</form>
		</div>
		
		<div id="scoreList">
			<?php
				session_start();
				include("User.php");
				$user=new User($_SESSION['userName'],$_SESSION['userIndent']);
				if(isset($_POST['btn'])){
					$userID=$_POST['sid'];
					$user->deleteUser($userID);
				}
			?>
		</div>
	</body>
</html>
