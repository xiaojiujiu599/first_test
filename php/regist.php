<?php
session_start();//启动Session
header("Content-Type: text/html; charset=utf8");
include('conn.php');//链接数据库

$name=$_POST['name'];
$pwd=$_POST['pwd'];
$pwdconfirm=$_POST['pwdconfirm'];
$yzm=$_POST['yzm'];

	//判断验证码的正确性
	$yzm = isset($_POST['yzm']) ? trim($_POST['yzm']):'';
	session_start();
	$true_yzm = $_SESSION['yzm'];
	unset($_SESSION['yzm']);
	if(strtolower($yzm) != strtolower($true_yzm)){
		//exit('验证码输入不正确');
		echo "<script>alert('验证码输入不正确');location='".$_SERVER["HTTP_REFERER"]."'</script>";
		exit;
	}
	
	//判断用户名和密码
	$sql="insert into user(username,password)values(? , ? )";
	$stmt=mysqli_prepare($con,$sql);
	mysqli_stmt_bind_param($stmt,'ss',$name,$pwd);
	$result_insert=mysqli_stmt_execute($stmt);
	if($result_insert){
	 	echo "<script>alert('您已注册成功，返回登录');location='".$_SERVER["HTTP_REFERER"]."'</script>";
	 	exit;
	}else {
	 	echo "<script>alert('用户名已存在,请重新注册！');location='".$_SERVER["HTTP_REFERER"]."'</script>";
	 	exit;
	}


