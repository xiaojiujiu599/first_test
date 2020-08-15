<?php 
session_start();
header("Content-Type: text/html; charset=utf8");
 
include('conn.php');

  
  $username = $_POST['username'];
  $password = $_POST['password'];
 
$sql = "select username,password from user where username=?";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'s',$username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

//var_dump($_POST);
if($row){
 	if( $username !=$row['username'] || $password !=$row['password'] ){
 		echo "<script>alert('密码错误，请重新输入');location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
		//echo "<script>alert('密码错误，请重新输入');location.href='../index.php'</script>";
 		exit;
	}else{
		$_SESSION['username']=$POST['username'];		
		echo "<script>alert('登录成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	}
}else{
	echo "<script>alert('您输入的用户名不存在');location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
 	exit;
}


