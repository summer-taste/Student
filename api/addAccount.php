<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>账号添加</title>
	</head>
	<body>
		<div style="font-size: 24px;">
			<form action="addAccount.php" method="post">
				
				用户名：<input type="text" name="courseid"/>
				密码：<input type="password" name="password" />
				
				身份：<select name="indent">
					<?php
						session_start();
						include("dbconnect.php");
						$sqls="select userindent 
						from user_info
						limit 1,3";
						$rs=mysqli_query($conn,$sqls);
						if($rs && mysqli_num_rows($rs)>0){
							$rows=mysqli_num_rows($rs);
							for($i=0;$i<$rows;$i++){
								$arr=mysqli_fetch_array($rs);
								echo "<option value=".$arr['userindent'].">";
								echo $arr['userindent'];
								echo "</option>";
							}
						}else{
							echo "身份数据为空，请先录身份信息";
							exit;
						}
					?>
					<input type="submit" name="btn" value="保存" />
			</form>
		</div>
		<?php
			if(isset($_POST['btn'])){
				$courseid=$_POST['courseid'];
				$password=$_POST['password'];
				$indent=$_POST['indent'];
				
				include("User.php");
				$user=new User($_SESSION['userName'],$_SESSION['userIndent']);
				$user->add($courseid,$password,$indent);
			}
		?>
	</body>
</html>
