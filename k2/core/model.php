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

}

?>
