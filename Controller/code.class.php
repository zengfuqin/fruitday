<?php
header("content-type:text/html;charset='utf-8' ");//设置页面的编码风格
// header('content-type:image/jpeg');
class Code{
	protected $img;
	protected $bgcolor;
	public function  __construct(){
		$this->init();
		$this->line();
		$this->string();
		$this->imgs();
	}
	protected function  init(){
		header('content-type:image/jpeg');//通知浏览器输出的是jpeg格式的图像
		$this->img=imagecreate(115, 38);//创建画布并设置大小  x轴115  y轴40
		$bgcolor=imagecolorallocate($this->img,255,255,255);//分配背景颜色
		// line();
		// string();
		// img();
	}
	// 添加干扰线，并循环3次，
	// for ($i=0; $i <3 ; $i++) { 
	// 	$linecolor=imagecolorallocate($img,  mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	// 	imageline($img, mt_rand(0,115), mt_rand(0,40), mt_rand(0,115),  mt_rand(0,40), $linecolor);
	// }
	// 添加干扰点，并循环25次，背景颜色随机
	protected function line(){
		for ($i=0; $i <25 ; $i++) { 
			$dotcolor=imagecolorallocate($this->img,  mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
			imagesetpixel($this->img, mt_rand(0,115), mt_rand(0,40),$dotcolor);
		}
	}
	//添加需要验证的字母或者数字
	protected function string(){
		$rand_str="abcdefghijklmnopqrstuvwsyzABCDEFGHIJKLMNOPQRSTUVWSYZ123456789";//需要使用到验证的一些字母和数字
		$str_arr=array();///命名一个数组
		for ($i=0; $i <4 ; $i++) { //循环4次，就是有四个随机的字母或者数字  
			$pos=rand(0,strlen($rand_str)-1);
			$str_arr[]=$rand_str[$pos];//临时交换
		}
		$x_start=115/4;//单个字符X轴位置
		$fontcolor[]=imagecolorallocate($this->img, 219, 39,12);
		$fontcolor[]=imagecolorallocate($this->img, 25, 164, 23);
		$fontcolor[]=imagecolorallocate($this->img, 38, 74, 196);
		$a=rand(0,2);
		$font=$fontcolor[$a];
		foreach ($str_arr as $key ) {
			imagettftext($this->img, 25,  mt_rand(-5,10), $x_start, 40/1.5, $font,"../Home/images/fonts-japanese-gothic.ttf", $key);
			//imagettftext($img, 字体的尺寸, 角度制表示的角度，0 度为从左向右读的文本。更高数值表示逆时针旋转, $x_start, 字符的高度, 字符颜色,"字符的字体样式路径", 遍历出后的字符);
			$x_start+=16;///遍历后单个字符沿X轴 +20
		}
	}
	protected function imgs(){
		imagefill($this->img, 0, 0, $this->bgcolor);//把背景填充到图像
		imagejpeg($this->img);//输出图像
		imagedestroy($this->img);//销毁图像
	}

}
$code=new Code();

?>

	