<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>成绩录入</title>
	</head>
	<body>
		<div style="font-size: 24px;">
			<form action="scoreInput.php" method="post">
				课程：<select name="courseid">
					<?php
						session_start();
						include("dbconnect.php");
						$sqls="select courseid,coursename from course_info where classid='计算机07'";
						$rs=mysqli_query($conn,$sqls);
						if($rs && mysqli_num_rows($rs)>0){
							$rows=mysqli_num_rows($rs);
							for($i=0;$i<$rows;$i++){
								$arr=mysqli_fetch_array($rs);
								echo "<option value=".$arr['courseid'].">";
								echo $arr['coursename'];
								echo "</option>";
							}
						}else{
							echo "课程数据为空，请先录入课程信息";
							exit;
						}
					?>
				</select>
				学号：<input type="text" name="sid" />
				成绩：<input type="text" name="score" />
				<input type="submit" name="btn" value="保存成绩" />
			</form>
		</div>
		<?php
			if(isset($_POST['btn'])){
				$cid=$_POST['courseid'];
				$sid=$_POST['sid'];
				$score=$_POST['score'];
				
				include("User.php");
				$user=new User($_SESSION['userName'],$_SESSION['userIndent']);
				$user->saveScore($cid,$sid,$score);
			}
		?>
	</body>
</html>
