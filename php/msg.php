<?php

//存储数据库
$con = mysqli_connect('localhost', 'root', 'root');
if(! $con )
{
    die('连接失败: ' . mysqli_error($con));
}
mysqli_select_db($con,'movie');
mysqli_query($con,"set names utf8");

$sql=" INSERT INTO comments (user,comment,addtime)
VALUES('$_POST[user]','$_POST[comment]','$_POST[addtime]') ";
mysqli_query($con,$sql);
echo "发表成功";	
 
mysqli_close($con);


