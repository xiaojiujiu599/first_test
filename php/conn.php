<?php
header('Content-type:text/html;charset=utf-8');

  $server="localhost";//主机
  $db_username="root";//你的数据库用户名
  $db_password="root";//你的数据库密码
  $db_name="movie";
  
  $con = mysqli_connect($server,$db_username,$db_password,$db_name);//链接数据库
  if(!$con){
    die("can't connect".mysqli_error());//如果链接失败输出错误
  }/*else{echo 'success';}*/
mysqli_set_charset($con,'utf8');
    
  //字符转换，读库
//mysql_query($con,'set names utf8');


