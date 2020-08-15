<?php 
	session_start();
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
	<link rel="stylesheet" href="css/index.css" />
	<link rel="stylesheet" href="css/base.css">
	<link rel="shortcut icon" href="./img/favicon.ico" />

	
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="js/index.js"></script>
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


<!-------------- banner -------------->
<div class="banner">
    <div id="slidershow2" class="carousel slide" data-ride="carousel">
		<!---- 设置轮播计数器 ---->
		<ol class="carousel-indicators">
			<li class="active" data-target="#slidershow2" data-slide-to="0"></li>
			<li data-target="#slidershow2" data-slide-to="1"></li>
			<li data-target="#slidershow2" data-slide-to="2"></li>
			<li data-target="#slidershow2" data-slide-to="3"></li>
		</ol>
		<!---- 设置轮播图片 ---->
		<div class="carousel-inner">
			<div class="item active">
				<a href="#">
					<img src="img/banner01.jpg" style="width: 100%; margin: 0 auto;">
				</a>
			</div>

			<div class="item">
				<a href="#">
					<img src="img/banner02.jpg" style="width: 100%; margin: 0 auto;">
				</a>
			</div>
			
			<div class="item">
				<a href="#">
					<img src="img/banner03.jpg" style="width: 100%; margin: 0 auto;">
				</a>
			</div>
			<div class="item">
				<a href="#">
					<img src="img/banner04.jpg" style="width: 100%; margin: 0 auto;">
				</a>
			</div>
		</div>
		<!---- 设置轮播图片控制器 ---->
		<a class="left carousel-control" href="#slidershow2" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#slidershow2" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
</div>

<!-------------- nav -------------->
<div class="nav">
	<div class="left">
		<p>地区&nbsp;&nbsp;&nbsp;&nbsp;<a href="more.php">全部&gt;</a></p>
		<ul>
			<li><a href="#">华语</a></li>
			<li><a href="#">香港</a></li>
			<li><a href="#">美国</a></li>
			<li><a href="#">欧洲</a></li>
			<li><a href="#">日本</a></li>
			<li><a href="#">韩国</a></li>
			<li><a href="#">泰国</a></li>
			<li><a href="#">印度</a></li>
		</ul>
	</div>
	<div class="right">
		<p>分类&nbsp;&nbsp;&nbsp;&nbsp;<a href="more.php">全部&gt;</a></p>
		<ul>
			<li><a href="#">喜剧</a></li>
			<li><a href="#">悲剧</a></li>
			<li><a href="#">爱情</a></li>
			<li><a href="#">动作</a></li>
			<li><a href="#">枪战</a></li>
			<li><a href="#">犯罪</a></li>
			<li><a href="#">恐怖</a></li>
			<li><a href="#">悬疑</a></li>
			<li><a href="#">动画</a></li>
			<li><a href="#">家庭</a></li>
			<li><a href="#">魔幻</a></li>
			<li><a href="#">青春</a></li>
		</ul>
	</div>
</div>

<!-------------- 电影历史 -------------->
<div class="history">
	
	<div class="history_box">
		<div class="history_title"><h3>走进电影</h3></div>
		<div class="part">
			<div class="tit">电影简介</div>
			<div><img src="img/history02.png"></div>
			<p>电影，是由活动照相术和幻灯放映术结合发展起来的一种连续的影像画面，是一门视觉和听觉的现代艺术，也是一门可以容纳戏剧、摄影、绘画、音乐、舞蹈、文字、雕塑、建筑等多种艺术的现代科技与艺术的综合体。</p>
		</div>
		<div class="part">
			<div class="tit">电影文化</div>
			<div><img src="img/history01.png"></div>
			<p>电影又具有独自的特征，电影在艺术表现力上不但具有其它各种艺术的特征，又因可以运用蒙太奇（法语：Montage）这种艺术性突跃的电影组接技巧，具有超越其它一切艺术的表现手段。</p>
		</div>
		<div class="part">
			<div class="tit">电影发展</div>
			<div><img src="img/history03.png"></div>
			<p style="text-indent: 0">发展历程包括：<br><br>无声电影→有声电影→彩色电影→数字电影</p>
		</div>
	</div>
</div>

<!-------------- 院线热映 -------------->
<div class="mod_hot">
<div class="mod_hot_box">
	<h3>院线热映</h3>
	<div class="mod_left">
		<div class="mod_player">
			<video src="video/1.mp4" width="100%" controls autoplay></video>
		</div>
		<div class="mod_playlist">
			<a href="play_comment.php">
				<span class="title">跳舞吧！大象</span>
			</a>
			<a href="#">
				<span class="title">倩女幽魂：人间情</span>
			</a>
			<a href="#">
				<span class="title">锤神 | 定档2.7</span>
			</a>
			<a href="#">
				<span class="title">速度与激情9</span>
			</a>
			<a href="#">
				<span class="title">钟馗归来万世妖灵</span>
			</a>
			<a href="#">
				<span class="title">古剑奇谭之伏魔记</span>
			</a>
		</div>
	</div>
	
	<div class="mod_right">
		
			<?php 
				error_reporting(E_ALL^E_NOTICE^E_WARNING);
				include("./php/conn.php");
				$sql = "select * from hot_film order by h_heat desc limit 0,6";
				$result = $con->query($sql);
						
				if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
			?>
				
				<div class="list_item">
					<a href="#"><img src="<?=$row['h_image']?>.png"></a>
					<div class="detail">
						<a href="#"><?=$row['h_title'];?></a>
						<p><?=$row['h_briefIntro'];?></p>
					</div>
				</div>
	
			<?php }}?>

	</div>
</div>
</div>

<!-------------- 热播推荐 -------------->
<div class="recommend">
<div class="recommend_box">

	<div class="main">
		<div class="main_header">
			<h3>热播推荐</h3>
			<div class="page">
				<a href="more.php">更多&gt;</a>
			</div>
		</div>
		<div class="content" id="content_1">

			<?php 
				$sql = "select * from film_information order by f_score desc limit 0,8";
				$result = $con->query($sql);
									
				if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
				?>
							
				<div class="list_item">
					<a href="#"><img src="<?=$row['image_src']?>"></a>
					<div class="detail">
						<a href="#"><?=$row['f_name'];?></a>
						<p><?=$row['director'];?></p>
					</div>
				</div>				
			<?php }}?>
		
		</div>
		
	</div>
	
	<div class="side">
		<h3>电影排行榜</h3>
		<div class="phb">
        
         <table width="290" >
            
    	<?php
                require './php/conn.php';
                $sql = "select f_name,introduction,f_score from film_information order by f_score desc limit 0,8";
                $result = $con->query($sql);
		?>
    <ul class="xunhuan" style="position:absolute;">
        <?php for($i=1; $i<=8; $i++){ ?>
             <li style="height:62px; line-height:62px; width:40px; text-align:center;"><?php echo "$i" ?></li>
        <?php } ?>
    </ul>
<?php
        while($row=mysqli_fetch_assoc($result)){
                    echo "<tr >";
					echo "<td rowspan='2' style=' border:none; display:inline-block; width:45px; height:32px; line-height:30px; text-align:center;'></td>";
                    echo "<td  style='display:inline-block; width:200px; height:32px; line-height:32px; font-size:16px;  font-weight:bold; border:none; '><a>".$row['f_name']."</a></td>";
                    echo "<td style='color:#aaa; border:none;'>{$row['f_score']}</td>";
                    echo "</tr>";
					
					echo "<tr style='border:none;'>";
					echo "<td style=' border:none; display:inline-block; width:40px;'></td>";
					echo "<td style=' display:inline-block; border:none; font-size:12px; width:200px;height:32px;  overflow: hidden;text-overflow: ellipsis;white-space: nowrap; color:#aaa;'>{$row['introduction']}</td>";
					echo "</tr>";
                }
                
        
            ?>
        </table>
        
			
		</div>
	</div>
	
</div>
</div>

<!-------------- 口碑电影榜 -------------->
<div class="koubei">
	<div class="koubei_box">
		
			
			<div class="tab">
				
				<ul class="nav nav-pills">
					<li><h3>口碑电影榜</h3></li>
					<li role="presentation" class="active">
						<a href="#lastest" role="tab" data-toggle="pill">最新</a>
					</li>
					<li role="presentation">
						<a href="#plot" role="tab" data-toggle="pill">剧情</a>
					</li>
					<li role="presentation">
						<a href="#messages" role="tab" data-toggle="pill">科幻</a>
					</li>
				</ul>

				<div class="tab-content">
				
					<div class="tab-pane active" id="lastest">			

						<?php 
							$sql = "select * from film_information order by prod_year desc limit 0,6";
							$result = $con->query($sql);
									
							if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
						?>
							
							<div class="list_item">
								<a href="#"><img src="<?=$row['image_src']?>"></a>
								<div class="detail">
									<a href="#"><?=$row['f_name'];?></a>
									<p><?=$row['director'];?></p>
								</div>
							</div>				
						<?php }}?>

					</div>
					
					<div class="tab-pane" id="plot">

						<?php 
							$sql = "select * from film_information where catogory like '%剧情%' limit 0,6";
							$result = $con->query($sql);
									
							if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
						?>
							
							<div class="list_item">
								<a href="#"><img src="<?=$row['image_src']?>"></a>
								<div class="detail">
									<a href="#"><?=$row['f_name'];?></a>
									<p><?=$row['director'];?></p>
								</div>
							</div>				
						<?php }}?>

					</div>
					
					<div class="tab-pane" id="messages">
						<?php 
							$sql = "select * from film_information where catogory like '%科幻%' limit 0,6";
							$result = $con->query($sql);
									
							if(!$result){echo "暂未搜到数据";}else{ while($row = mysqli_fetch_assoc($result)){ 
						?>
							
							<div class="list_item">
								<a href="#"><img src="<?=$row['image_src']?>"></a>
								<div class="detail">
									<a href="#"><?=$row['f_name'];?></a>
									<p><?=$row['director'];?></p>
								</div>
							</div>				
						<?php }}?>
					</div>
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
		<p>电子邮箱：1322648498@qq.com</p>
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