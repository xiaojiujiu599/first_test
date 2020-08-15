<?php  

//用户展示数据
$con = mysqli_connect('localhost', 'root', 'root');
if(! $con )
{
    die('连接失败: ' . mysqli_error($con));
}
 
mysqli_select_db($con,'movie');
mysqli_query($con,"set names utf8");
$sql = "select * FROM comments";
$result = mysqli_query($con,$sql );

while($row=mysqli_fetch_array($result)){
	$datas[] = array("user"=>$row['user'],"comment"=>$row['comment'],"addtime"=>$row['addtime']);
}
echo json_encode($datas);//以json格式编码 

