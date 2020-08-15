<?php session_start();
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>电影网站_更多</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/more.css" />
	
<script src="jquery/jquery-3.4.1.min.js"></script>
<script>
	function checkLoginForm() {
	var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username == null || username == "") {
        alert("用户名不能为空！");
        document.getElementById("username").focus();
        return false;
    }
    if (password == null || password == "") {
        alert("密码不能为空！");
        document.getElementById("password").focus();
        return false;
    }
	/*if(password.length < 2) {
        alert("密码长度必须为2-16位");
        $("password").focus();
        return false;
    }*/
    return true;
}

function checkRegistForm(){
	if(myform.name.value==""){
		 alert("请输入用户名");
		 myform.name.focus();
		 return false;
	 }
	 if (myform.pwd.value==""){
		 alert("请输入密码");
		 myform.pwd.focus();
		 return false;
	 }
	 if(myform.pwdconfirm.value==""){
		 alert("请再一次输入密码");
		 myform.pwdconfirm.focus();
	 }
	 if(myform.pwd.value != myform.pwdconfirm.value){
		 alert("你输入的两次密码不一致，请重新输入！");
		 myform.pwd.focus();
		 return false;
	 }
	 if (myform.yzm.value==""){
		 alert("请输入验证码");
		 myform.yzm.focus();
		 return false;
	 }
}
function showpage(page){
	for(var i=1;i<=3;i++) {
	if (page==i){
		document.getElementById("page"+page).style.display="block";
	} else {
		document.getElementById("page"+i).style.display="none";
	}
}
}


</script>
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
            <a href="#" class="icon_history"></a>
			<span style="font-size: 16px;">
				
				<?php if(isset($_SESSION['username'])){echo '欢迎 '.$_SESSION['username'].' 回来'; }else{echo "";}   ?>
			</span>
            <!--<a href="login.php" class="login">登录</a> |
            <a href="regist.php" class="regist">注册</a>-->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login">
				登录
			</button> | 
		   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register">
				注册
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



<!-------------- 主要内容 -------------->
<div class="list_page">
	<!-------------- 上部分的选项清单 -------------->
	<div class="list_category">
		<div class="category_content">
			<div class="category">
				<a href=""><span class="category_item">综合排序</span></a>
				<a href="javascript:showpage(1);"><span class="category_item">热播榜</span></a>
				<a href="javascript:showpage(2);"><span class="category_item">好评榜</span></a>
				<a href="javascript:showpage(3);"><span class="category_item">新上线</span></a>
			</div>
			<div class="category">
				<a href="#"><span class="category_item selected">全部地区</span></a>
				<a href="#"><span class="category_item ">华语</span></a>
				<a href="#"><span class="category_item">香港地区</span></a>
				<a href="#"><span class="category_item">美国</span></a>
				<a href="#"><span class="category_item">欧洲</span></a>
				<a href="#"><span class="category_item">韩国</span></a>
				<a href="#"><span class="category_item">日本</span></a>
				<a href="#"><span class="category_item">泰国</span></a>
				<a href="#"><span class="category_item">其他</span></a>
			</div>
			<div class="category">
				<a href="#"><span class="category_item selected">全部类型</span></a>
				<a href="#"><span class="category_item">喜剧</span></a>
				<a href="#"><span class="category_item">爱情</span></a>
				<a href="#"><span class="category_item">动作</span></a>
				<a href="#"><span class="category_item">枪战</span></a>
				<a href="#"><span class="category_item">魔幻</span></a>
				<a href="#"><span class="category_item">科幻</span></a>
				<a href="#"><span class="category_item">青春</span></a>
				<a href="#"><span class="category_item">战争</span></a>
				<a href="#"><span class="category_item">惊悚</span></a>
				<a href="#"><span class="category_item">恐怖</span></a>
				<a href="#"><span class="category_item">悬疑</span></a>
				<a href="#"><span class="category_item">动画</span></a>
			</div>
			<div class="category">
				<a href="#"><span class="category_item selected">全部年份</span></a>
				<a href="#"><span class="category_item">2019</span></a>
				<a href="#"><span class="category_item">2018</span></a>
				<a href="#"><span class="category_item">2017</span></a>
				<a href="#"><span class="category_item">2016-2011</span></a>
				<a href="#"><span class="category_item">2010-2000</span></a>
				<a href="#"><span class="category_item">90年代</span></a>
				<a href="#"><span class="category_item">80年代</span></a>
				<a href="#"><span class="category_item">其他</span></a>
			</div>
		</div>	
	</div>
	<!-------------- 下半部分 -------------->
	<div class="list_content">
		<div class="list_wrap">
			<div id="page1" style="display:block;">
				<ul class="mod_ul">				
					<?php 
						error_reporting(E_ALL^E_NOTICE^E_WARNING);
						include("./php/conn.php");
						$sql = "select * from film_information order by f_score desc limit 0,6";
						$result = $con->query($sql);
												
						if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
						?>
						<li class="mod_li">
							<div class="list_img">
								<div class="link"><img src="<?=$row['image_src']?>"></div>
								<div class="title">
									<p class="main">
										<span class="score"><?=$row['f_score']?></span>
										<a href="#"><?=$row['f_name']?></a>
									</p>
									<p class="sub">
										主演：<?=$row['actor']?> 
									</p>
								</div>
							</div>
						</li>		
					<?php }}?>
				</ul>			
			</div>

			<div id="page2" style="display:none;">这是第2页的内容</div>

			<div id="page3" style="display:none;">
			<ul class="mod_ul">				
					<?php 
						error_reporting(E_ALL^E_NOTICE^E_WARNING);
						include("./php/conn.php");
						$sql = "select * from film_information order by prod_year desc limit 0,6";
						$result = $con->query($sql);
												
						if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
						?>
						<li class="mod_li">
							<div class="list_img">
								<div class="link"><img src="<?=$row['image_src']?>"></div>
								<div class="title">
									<p class="main">
										<span class="score"><?=$row['f_score']?></span>
										<a href="#"><?=$row['f_name']?></a>
									</p>
									<p class="sub">
										主演：<?=$row['actor']?> 
									</p>
								</div>
							</div>
						</li>		
					<?php }}?>
				</ul>
			</div>
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
