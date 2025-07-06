<?php

class Model
{
	static $conn = "";

	function __construct()
	{
		$serverName = "localhost";
		$userName = "root";
		$pass = "";
		$dbName = "digi_mvc";
		$attr = array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
		self::$conn = new PDO("mysql:host=" . $serverName . ";dbname=" . $dbName, $userName, $pass, $attr);
		self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	function doSelect($sql,$values=array(),$fetch='',$fetchStyle=PDO::FETCH_ASSOC)
	{
		$stmt=self::$conn->prepare($sql);
		foreach ($values as $key=>$value)
		{
			$stmt->bindValue($key+1,$value);
		}
		$stmt->execute();
		if($fetch=="")
		{
			$result=$stmt->fetchAll($fetchStyle);
		}
		else
		{
			$result=$stmt->fetch($fetchStyle);
		}
		return$result;
	}

	function doQuery($sql,$values=array())
	{
		$stmt=self::$conn->prepare($sql);
		foreach ($values as $key=>$value)
		{
			$stmt->bindValue($key+1,$value);
		}
		$stmt->execute();
	}

	function deleteArrayQuery($sql,$array)
	{
		$IN = str_repeat("?,", count($array) - 1);
		$IN = $IN . "?";
		//$sql="delete * from tbl_x where id in "; نمونه ورودی
		$sql=$sql." ( " . $IN . " ) ";
		$stmt = self::$conn->prepare($sql);
		foreach ($array as $key => $value) {
			$stmt->bindValue($key + 1, $value);
		}
		$stmt->execute();
	}/*حذف چند سطر از یک جدول با اجرای یک کووری */

	function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
	{

		$new_height = $h;

		list($width, $height) = getimagesize($file);

		$r = $width / $height;

		if ($crop) {
			if ($width > $height) {
				$width = ceil($width - ($width * abs($r - $w / $h)));
			} else {
				$height = ceil($height - ($height * abs($r - $w / $h)));
			}
			$newwidth = $w;
			$newheight = $h;
		} else {
			if ($w / $h > $r) {
				$newwidth = $h * $r;
				$newheight = $h;
			} else {
				$newheight = $w / $r;
				$newwidth = $w;
			}
		}

		$what = getimagesize($file);

		switch (strtolower($what['mime'])) {
			case 'image/png':
				$src = imagecreatefrompng($file);

			break;
			case 'image/jpeg':
				$src = imagecreatefromjpeg($file);
			break;
			case 'image/gif':
				$src = imagecreatefromgif($file);
			break;
			default:
				//die();
		}

		if ($new_height != '') {
			$newheight = $new_height;
		}

		$dst = imagecreatetruecolor($newwidth, $newheight);//the new image
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

		imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

		return $dst;


	}

	static function getoption()
	{
		$sql = "select * from tbl_option";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$options = array();
		foreach ($res as $row) {
			$seting = $row['setting'];
			$val = $row['value'];
			$options[ $seting ] = $val;
		}
		return $options;
	}/*تمام مقادیر جدول آپشن را به صورت یک ارایه برمیگرداند*/

	function calcFlipDateEnd($time_special)
	{
		$options=self::getoption();
		$special_duration=$options['special_duration'];
		$time_end=$time_special+ $special_duration;
		$date_end=date('F d,Y H:i:s',$time_end);
		return $date_end;
	}/*با دادن مقدار زمان اولیه از جدول محصولات تاریخ پایان تایمر را به شکل قابل قبول پلاگین فلیپ تایمر بر میگرداند*/

	function calcDiscount($discount , $price)
	{
		$price_discount = $discount * $price / 100;
		$price_final = $price - $price_discount;
		return array( $price_discount, $price_final );
	}/*با دادن مقدار درصد تخفیف و قیمت محصول قیمت نهایی و قیمت تخفیف را به صورت یک ارایه برمیگرداند*/

	public static function sessionInit()
	{
		@session_start();
	}

	public static function sessionSet($name,$value)
	{
		$_SESSION[$name]=$value;
	}

	public static function sessionGet($name)
	{
		if (isset($_SESSION[$name]))
		{
			return $_SESSION[$name];
		}
		else
		{
			return false;
		}
	}

	public static function getBasketCookie()
	{
		if (isset($_COOKIE['basket']))
		{
			$cookie=$_COOKIE['basket'];
		}
		else
		{
			$value = time();
			$expiration = time()+7*24*3600;
			setcookie("basket",$value,$expiration,"/");
			$cookie=$value;
		}
		return $cookie;
	}

	function getBasketInfo()
	{
		$cookie = self::getBasketCookie();

		$sql="select b.tedad,b.id as basketRow,p.*,c.title AS colorTitle,g.title AS guarantyTitle 
		FROM tbl_basket b 
		LEFT JOIN tbl_product p ON b.idproduct=p.id
		LEFT JOIN tbl_color c ON b.color=c.id
		LEFT JOIN tbl_guaranty g ON b.guaranty=g.id
		where cookie=?
		
		";

		$params = array($cookie);
		$res = $this->doSelect($sql,$params);

		$totaldiscountAll=0;
		$totalpriceall=0;
		foreach ($res as $key=>$row)
		{
			$price=$row['price'];
			$tedad=$row['tedad'];
			$totalprice=$price*$tedad;
			$totalpriceall=$totalpriceall+$totalprice;

			$discount=$row['discount']*$price/100;
			$discountTotal=$discount*$tedad;
			$res[$key]['discountTotal']=$discountTotal;
			$totaldiscountAll=$totaldiscountAll+$discountTotal;

		}

		return array($res,$totalpriceall,$totaldiscountAll);
	}

}

?>
