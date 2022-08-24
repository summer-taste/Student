<?php
/**用户类*/
class User{
	private $userName;  //用户名
	private $userPing;	//用户密码
	private $UserIdent;	//用户身份
	private $userMenu;	//用户菜单
	
	//构造函数
	function __construct($uname,$uident){
		$this->userName=$uname;
		$this->UserIdent=$uident;
		$this->menuInitial();
	}
	
	/**用户菜单初始化*/
	private function menuInitial(){
		include("menu.php");
		$this->userMenu['menuName']=array();
		$this->userMenu['menuUrl']=array();
		switch($this->UserIdent){
			case "教务处":
				$this->userMenu['menuName']=$menuName;
				$this->userMenu['menuUrl']=$menuUrl;
				break;
			case "教师":
				array_push($this->userMenu['menuName'],$menuName[2]);
				array_push($this->userMenu['menuName'],$menuName[3]);
				array_push($this->userMenu['menuUrl'],$menuUrl[2]);
				array_push($this->userMenu['menuUrl'],$menuUrl[3]);
				break;	
			case "学生":
				array_push($this->userMenu['menuName'],$menuName[2]);
				array_push($this->userMenu['menuUrl'],$menuUrl[2]);
				break;
		}
	}
	
	/**显示用户菜单**/
	public function menuShow(){
		$menuSize=sizeof($this->userMenu['menuName']);
		for($i=0;$i<$menuSize;$i++){
			echo "<a href=".$this->userMenu['menuUrl'][$i]." target='dataArea'>";
			echo $this->userMenu['menuName'][$i];
			echo "</a><br>";
		}
	}
	
	/* 删除账号方法 */
	public function deleteUser($sid){
		include("dbconnect.php");
		$sqls="delete
		from user_info 
		where username='{$sid}'";
		$rs=mysqli_query($conn,$sqls);
		if($rs){
			echo "账号删除成功";
		}else{
			echo "账号删除失败";
		}
	}
	
	/* 添加账号方法 */
	public function add($courseid,$psaaword,$indent){
		include("dbconnect.php");
		$sqls="insert into user_info(username,userping,userindent) values({$courseid},md5('{$psaaword}'),'{$indent}')";
		$rs=mysqli_query($conn,$sqls);
		if($rs){
			echo "账号保存成功";
		}else{
			echo "账号保存失败";
		}
	}
	
	/* 保存成绩方法 */
	public function saveScore($cid,$sid,$score){
		include("dbconnect.php");
		if($this->repeatCheck($cid,$sid)){
			echo "<lable id='ts'>该学生的该门课程成绩已存在</lable>";
			return;
		}
		$sqls="insert into score(courseid,studentid,score) values({$cid},'{$sid}','{$score}')";
		$rs=mysqli_query($conn,$sqls);
		if($rs){
			echo "成绩保存成功";
		}else{
			echo "成绩保存失败";
		}
	}
	
	/* 成绩查重方法 */
	private function repeatCheck($cid,$sid){
		include("dbconnect.php");
		$sqls="select courseid,studentid,score from score where courseid={$cid} and studentid='{$sid}'";
		$rs=mysqli_query($conn,$sqls);
		if($rs && mysqli_num_rows($rs)>0){
			return true;
		}else{
			return false;
		}
	}

	/* 班级查询方法 */
	public function scoreClass($sid){
		include("dbconnect.php");
		$sqls="select classid,coursename,term,teacher,point  
		from course_info 
		where classid='{$sid}'";
		$rs=mysqli_query($conn,$sqls);
		if($rs && mysqli_num_rows($rs)>0){
			//有该班级
			$rows=mysqli_num_rows($rs);		//统计记录集中的行数
			for($i=0;$i<$rows;$i++){
			$arr=mysqli_fetch_array($rs);	//把每一条记录转化为数组
			//输出转化后数组中的内容
			echo "<p>班级:{$arr['classid']}<br> 课程名称:{$arr['coursename']}<br> 教师号:{$arr['teacher']}<br> 开设学期:{$arr['term']}<br> 学分点:{$arr['point']}</p>";
			}
		}else{
			//没有该班级
			echo "暂无该班级数据"; 
		}
	}
	
	/* 成绩查询方法 */
	public function scoreQuery($sid){
		include("dbconnect.php");
		$sqls="select b.studentid,a.coursename,a.term,b.score 
		from course_info a right join score b on a.id=b.courseid 
		where studentid='{$sid}'";
		$rs=mysqli_query($conn,$sqls);
		if($rs && mysqli_num_rows($rs)>0){
			//有该生的成绩记录
			$rows=mysqli_num_rows($rs);		//统计记录集中的行数
			for($i=0;$i<$rows;$i++){
			$arr=mysqli_fetch_array($rs);	//把每一条记录转化为数组
			//输出转化后数组中的内容
			echo "<p>学生号:{$arr['studentid']}<br> 课程名称:{$arr['coursename']}<br>  开设学期:{$arr['term']}<br> 分数:{$arr['score']}</p>";
			}	
		}else{
			//没有该生的成绩记录
			echo "暂无该生成绩数据";
		}
	}
	
}
?>