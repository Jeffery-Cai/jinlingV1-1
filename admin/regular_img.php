<?php

session_start();

$str="123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$code=substr(str_shuffle($str),0,4);
$_SESSION["code"]=$code;
// 新建画板
	$block=imagecreatetruecolor(100,50);

// 画矩形
	$bg_color=imagecolorallocate($block,244,244,0);

// 填充颜色
	imagefilledrectangle($block,0,0,150,50,$bg_color);


// 字体颜色
	$textcolor=imagecolorallocate($block,0,0,0);
	// imagestring ( $block ,5 ,0 ,0 ,"Jeffery",$textcolor );
	imagettftext($block,14,-35,10,25,$textcolor,"./msyhbd.ttf",$code{0});
	imagettftext($block,28,25,30,40,$textcolor,"./msyhbd.ttf",$code{1});
	imagettftext($block,13,-15,50,25,$textcolor,"./msyhbd.ttf",$code{2});
	imagettftext($block,24,5,70,25,$textcolor,"./msyhbd.ttf",$code{3});

// 干扰点
	$point_color=imagecolorallocate($block,0,0,0);
	for($i=1;$i<300;$i++)
	{
		imagesetpixel($block,rand(0,100),rand(100,0),$point_color);
	}
// 干扰线
	$line_color=imagecolorallocate($block,0,0,0);
	for($i=1;$i<300;$i++)
	{
		imageline($block,rand(0,150),rand(250,0),rand(0,150),rand(250,0), $line_color);
	}


// 浏览器显示png
	header("Content-Type:image/png");

// 生成图片
	imagepng($block);
?>