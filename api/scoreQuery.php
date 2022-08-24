<!-- 成绩查询页面 -->
<html>
	<head>
		<title>成绩查询</title>
	</head>
	<body>
		<div id="queryform" style="font-size: 24px;">
			<form action="scoreQuery.php" method="post">
				请输入要查询的学号：<input type="text" name="sid" />
				<input type="submit" name="btn" value="查询" />
			</form>
		</div>
		
		<div id="scoreList">
			<?php
				session_start();
				include("User.php");
				$user=new User($_SESSION['userName'],$_SESSION['userIndent']);
				if(isset($_POST['btn'])){
					$studentID=$_POST['sid'];
					$user->scoreQuery($studentID);
				}
			?>
		</div>
	</body>
</html>