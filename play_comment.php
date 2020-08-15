<?php session_start();
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>电影网站_毕业设计</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/play_comment.css" />
	<link rel="stylesheet" href="css/base.css">
	<link rel="shortcut icon" href="./img/favicon.ico" />

	
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="js/play_comment.js"></script>


</head>
<body>
<!-------------- header -------------->
<div class="header">
    <div class="header_box">
        <div class="logo"></div>
        <div class="center">
            <form action="#">
                <input class="search" type="search" placeholder="请输入搜索内容" />
                <button type="submit" class="search_btn">全网搜</button>
            </form>
        </div>
        <div class="right">
            <a href="index.php">首页</a>
            <a href="#" class="icon_history"></a>
            <span style="font-size: 16px;">
				<?php if(isset($_SESSION['username'])){echo '欢迎 '.$_SESSION['username'].' 回来'; }else{echo "";}   ?>
			</span>
       		
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
						<img src="php/yzm.php" onClick="this.src='yzm.php?nocache='+Math.random()">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">提交</button>
						<button class="btn btn-danger" data-dismiss="modal">取消</button>
					</div>
				</form>
           </div>
            
            
            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#login">还返回登录界面</a>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<!--------------  主体部分 -------------->
<div class="content">
	<!--------------  视频播放部分 -------------->
	<div class="play">
		<div class="p_left">
			<div class="video">
				<video src="video/1.mp4" width="780px" controls autoplay></video>
			</div>
		</div>
		<div class="p_right">
			<div class="p_right_box">
				<div class="play_list_title">
					<h4>推荐视频</h4>
				</div>
				
				<table border="0" class="tuijian" style="height: 380px;background: rgb(240,240,240);">
					<?php 
					error_reporting(E_ALL^E_NOTICE^E_WARNING);
					include("./php/conn.php");
						$sql = "select * from hot_film order by h_heat desc limit 0,5";
						$result = $con->query($sql);
						
						if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
					?>
						<tr>
							<td width="115px;" rowspan="2" style="padding-left: 8px"><img src="<?=$row['h_image']?>.png"></td>
							<td style="text-indent: 1em; vertical-align: top;padding-top: 10px;"><a href="#"><?=$row['h_title'];?></a></td> 
						</tr>
						<tr>
							<td style="text-indent: 1em;font-size: 12px">热度：<?=$row['h_heat'];?></td>
						</tr>
					<?php }}?>
				</table>
				
				
			</div>
		</div>
		<div class="pname">
			<h3>片名：<span>跳舞吧！兔子</span></h3>
		</div>
	</div>


	<!--------------  评论部分 -------------->
	<div class="comment">
		<div class="com_left">
			<div class="com_box">
				<p><b>发表评论</b></p>
 				<div class="con" id="con">
 					
					<?php
					$user = $_SESSION['username'];
							
							if(isset($user)){
								echo "欢迎 <span class='user'>$user</span> 来评论".'<br>';
								echo "
								评论区：<textarea cols='40' rows='6' class='text' placeholder='请说出您的建议和意见，最多不超过60个字'></textarea>.
								<input type='button' value='发表' class='btn' >";
								
							}else{
								echo "<span style='color:#ff8711'>登录</span>后可以发言";
							}
					?>
				</div>
			</div>
			<ul class="ul" style="display: block;"></ul>

		</div>
		
		<div class="com_right">
			
		</div>
	</div>
	
</div>


<!-------------- 底部 -------------->
<div class="footer">
	<div class="shang">
		<div class="one">
			<div class="title">热门频道</div>
			<ul>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
				<li><a href="">电视剧</a></li>
			</ul>
		</div>
		<div class="two">
			<div class="title">特色推荐</div>
			<ul>
				<li><a href="#">原创自媒体</a></li>
				<li><a href="#">网络电影</a></li>
				<li><a href="#">拍客</a></li>
				<li><a href="#">杀毒软件</a></li>
			</ul>
		</div>
		<div class="three">
			<div class="title">软件下载</div>
			<a href="#">
				<img src="./img/01.png" alt="">
				<span>手机版</span>
			</a>
			<a href="#">
				<img src="./img/02.png" alt="">
				<span>手机版</span>
			</a>
			<a href="#">
				<img src="./img/03.png" alt="">
				<span>手机版</span>
			</a>
			<a href="#">
				<img src="./img/04.png" alt="">
				<span>手机版</span>
			</a>
			<a href="#">
				<img src="./img/05.png" alt="">
				<span>手机版</span>
			</a>
		</div>
		<div class="four">
			<div class="title">服务</div>
			<ul>
				<li><a href="#">客服</a></li>
				<li><a href="#">反馈</a></li>
				<li><a href="#">侵权投诉</a></li>
				<li><a href="#">免广告合作</a></li>
			</ul>
		</div>
	</div>
	
	<div class="xia">
		<p>&copy;长沙民政职业技术学院&nbsp;&nbsp;lxy的电影网站&nbsp;&nbsp;2019-07-01</p>
		<p>电子邮箱：239385302@xx.com</p>
		<p>邮编：410000</p>
	</div>
</div>

<!-------------- 箭头 -------------->
<div class="top">
	<a href="#">
		<img src="./img/top.png" alt="">
	</a>
	<p>TOP</p>
</div>
	
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
