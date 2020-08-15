<?php
$str="23456789ABCDEFGHGKLMNPQRSTUVWXYZ";
  $str=str_shuffle($str);
  $code=substr($str, 0,4);
 session_start();
  $_SESSION['yzm']=$code;

//创建画布
 $image=imagecreatetruecolor(80, 30);
 $bg_color = imagecolorallocate($image,235,235,255);
imagefill($image,0,0,$bg_color);

//文本绘制
$fontSize = 16;
$fontStyle = '../font/msyh.ttf';
for($i=0;$i<4;++$i){
	$fontColor = imagecolorallocate($image,mt_rand(0,100),mt_rand(0,250),mt_rand(0,255));
	imagettftext(
		$image,
		$fontSize,
		rand(0,20)-mt_rand(0,25),
		$fontSize*$i+15, mt_rand(15,30),
		$fontColor,
		$fontStyle,
		$code[$i]
	);
}

//干扰线
 for($i=0;$i<6;$i++){
	 $color = imagecolorallocate($image,rand(0,150), rand(0,150), rand(0,150));
     imageline($image, rand(0,100), 0, rand(0,30*5), 30,$color);
  }

  header("Content-Type: image/png");

  imagepng($image);
  imagedestroy($image);

