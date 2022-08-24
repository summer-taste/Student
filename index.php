<html>
	<head>
		<title></title>
		<style type="text/css">
			#picture1{
				width: 1908px;
				height: 180px;
				opacity: 0.9;
			}
			#picture2{
				width: 1908px;
				height: 763px;
			}
			#text{
				position: absolute;
				font-size: 60px;
				font-family: "宋体";
				color: white;
				margin-top: -80px;
				margin-left: 50px;
			}
			h1{
				text-align: center;
				font-size: 32px;
				font-family: "幼圆";
				color: rgb(52,54,56);
			}
			hr{
				height: 5px;
				color: white;
			}
			#user{
				width: 400px;
				height: 400px;
				border: 2px solid rgb(107,120,137);
				border-radius: 30px;
				background-color: rgba(255,255,255,0.1);
				display: flex;
				flex-direction: column;
				margin: 180px 750px;
				position: absolute;
			}
			.picture{
				width: 40px;
				width: 40px;
				margin: -12px auto;
			}
			#usernametext,#userpingtext{
				width: 230px;
				height: 50px;
				font-size: 28px;
				margin: 15px 0 0 5px;
				background-color:rgba(255,255,255,0);
				border: 0px solid white;
				font-family: "楷体";
			}
			::-webkit-input-placeholder{
				color: white;
				font-family: "楷体";
				opacity: 0.4;
			}
			.user{
				height: 70px;
				width: 280px;
				border: 0 solid white;
				margin: 30px 0 0 60px;
				background-color: rgba(255,255,255,0.1);
			}
			#button{
				width: 250px;
				height: 40px;
				color: white;
				border: none;
				font-size: 28px;
				font-family: "楷体";
				background-color: rgb(81,77,161);
				margin: 28px 0 0 78px;
				border-radius: 25px;
			}
		</style>
	</head>
	<body>
		<div id="top">
			<img src="asset/背景图1.png" id="picture1" />
			<div>	
				<p id="text">学生学籍信息管理系统</p>
			</div>
		</div>
		
		<div id="user">
			<form action="api/login.php" method="post">
				<h1>用户登录</h1>
				<hr>
				<div class="user">
					<img src="asset/图层%201.png" class="picture"/>
					<input type="text" name="username" id="usernametext" placeholder="用户名"/>
				</div>
				<div class="user">
					<img src="asset/图层%202.png" class="picture"/>
					<input type="password" name="userping" id="userpingtext" placeholder="密码" />
				</div>
				<div>
					<input type="submit" value="登录" id="button" />
				</div>
			</form>
		</div>
		
		<div id="foot">
			<img src="asset/背景图%202.png" id="picture2" />			
		</div>
	</body>
</html>