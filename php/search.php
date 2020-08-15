<?php
session_start();
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	include("conn.php");
	$keywords = $_GET['keywords'];
	$sql = "select * from film_information where f_name like '%$keywords%'";
	$result = mysqli_query($con,$sql);
	if(!$result){
		die('无法读取数据：'.mysqli_error());
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>电影介绍</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/base.css">
	<link rel="shortcut icon" href="../img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../css/search.css">
	<link rel="stylesheet" href="../css/style.css">

</head>

<body>
<!-------------- header -------------->
<div class="header">
    <div class="header_box">
        <div class="logo"></div>
        <div class="center">
            <form action="./php/search.php">
                <input class="search" type="search" name="keywords" placeholder="请输入搜索内容" onFocus="this.setAttribute('placeholder','');" onBlur="if(this.value=='')this.setAttribute('placeholder','请输入搜索内容'); "  />
                <button type="submit"  class="search_btn">全网搜</button>
            </form>
        </div>
        <div class="right">
            <a href="#" class="icon_history"></a>
            <span style="font-size: 16px;">
          		 <?php if(isset($_SESSION['username'])){echo '欢迎 '.$_SESSION['username'].' 回来'; }else{echo "";}   ?>
            </span>
            <!--<a href="login.php" class="login">登录</a> |
            <a href="regist.php" class="regist">注册</a>-->
            
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login">
				<?php if(isset($_SESSION['username'])){echo  "<a href='./php/my.php'>我的</a>"; }else{echo "登录";}   ?>
			</button> | 
	    
		    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register">
		   		<?php if(!isset($_SESSION['username'])){echo  "注册"; }else{echo "<a href='./php/logout.php'>注销</a>";}   ?>
			</button>
        </div>
    </div>
</div>


<!-------------- 登录模态框-------------->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">登录</h4>
            </div>
            
            <div class="modal-body">
				<form action="php/login.php" method="post" class="form-group" >
					<div class="form-group">
						<label for="">用户名：</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
					</div>
					<div class="form-group">
						<label for="">密码：</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="请输入密码"  maxlength="16">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" onclick="return checkLoginForm();">登录</button>
						<button class="btn btn-danger" data-dismiss="modal">取消</button>
					</div>
				</form>
           </div>
            
            
            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#register">还没有账号？点我注册</a>
        </div>
    </div>
</div>


<!-------------- 注册模态框-------------->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="zhuce" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="zhuce">注册</h4>
            </div>
            
            <div class="modal-body">
				<form action="php/regist.php" method="post" class="form-group" name="myform" onsubmit=" return checkRegistForm();">
					<div class="form-group">
						<label for="">用户名</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="">密码</label>
						<input type="password" class="form-control" id="pwd" name="pwd">
					</div>
					<div class="form-group">
						<label for="">再次输入密码</label>
						<input type="password" class="form-control" id="pwdconfirm" name="pwdconfirm">
					</div>
					<div class="form-group">
						<label for="" style="display:block">验证码</label>
						<input type="text" name="yzm" id="yzm" class="form-control short">
						<img src="php/yzm.php" onClick="this.src='./php/yzm.php?nocache='+Math.random()">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">提交</button>
						<button class="btn btn-danger" data-dismiss="modal">取消</button>
					</div>
				</form>
           </div>
            
            
            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#login">返回登录界面</a>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<canvas id="canvas"></canvas>
<script src="../js/search_bg.js"></script>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>



<div class="wrapper">
	<div class="content">
		<table border="0">
		<?php if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ ?>
			<tr><td colspan="3"><span>&gt;&gt;&nbsp;</span><?=$row['f_name'];?></td></tr>	
			<tr>
				<td rowspan="5" width="165px"><img src="../<?=$row['image_src']?>" width="150px" height="210px"></td>
				<td width="360px">导演：<?=$row['director'];?></td>
				<td rowspan="2" style="text-align: center">评分：<span style="font-size: 22px;color: #ed7f3d;"><?=$row['f_score']?></span></td>
			</tr>
			<tr><td>主演：<?=$row['actor'];?></td></tr>
			<tr><td>类型：<?=$row['catogory'];?></td><td></td></tr>
			<tr><td>产地：<?=$row['prod_country'];?></td><td></td></tr>
			<tr><td>上映日期：<?=$row['prod_year'];?></td><td></td></tr>
			<tr height="120px"><td colspan="3" style="text-indent: 2em;line-height:24px;"><span class="intro">电影简介：</span><?=$row['introduction'];?></td><td></td></tr>
		<?php }}?>
		</table>
	</div>
	
</div>



</body>
</html>