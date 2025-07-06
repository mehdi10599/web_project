<?php


class model_showcart2 extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function addAddress($data,$editAddressId)
	{
		Model::sessionInit();
		$userId = Model::sessionGet("userId");
		$family = $data['family'];
		$mobile = $data['mobile'];
		$tel = $data['tel'];
		$ostan = $data['state'];
		$shahr = $data['shahr'];
		$mahale = $data['town'];
		$address = $data['address'];
		$codeposti = $data['codeposti'];

		echo $editAddressId;

		if ($editAddressId=="") {
			$sql = "insert into tbl_user_address (userid,family,mobile,tel,ostan,shahr,mahale,address,codeposti) VALUES (?,?,?,?,?,?,?,?,?)";
			$params = array( $userId, $family, $mobile, $tel, $ostan, $shahr, $mahale, $address, $codeposti );
		}
		else{
			$sql = "UPDATE tbl_user_address set family=?,mobile=?,tel=?,ostan=?,shahr=?,mahale=?,address=?,codeposti=? WHERE id=? ";
			$params = array( $family, $mobile, $tel, $ostan, $shahr, $mahale, $address, $codeposti, $editAddressId );
		}
		$this->doQuery($sql,$params);
	}

	function getUserAddress()
	{
		Model::sessionInit();
		$userId = Model::sessionGet("userId");
		$sql="select * from tbl_user_address where userid=?";
		$res = $this->doSelect($sql,array($userId));
		return $res;
	}

	function getaddressInfo($addressId)
	{
		$sql="select * FROM tbl_user_address WHERE id=?";
		$res = $this->doSelect($sql,array($addressId),1);
		return $res;
	}

	function getPostType()
	{
		$sql = "select * from tbl_post_type";
		$res = $this->doSelect($sql);
		return $res;
	}

	function setSessionAddress($addressId)
	{
		$sql="SELECT * FROM tbl_user_address WHERE id=?";
		$addressInfo = $this->doSelect($sql,array($addressId),1);

		$addressInfo=serialize($addressInfo);
		self::sessionInit();
		self::sessionSet("addressInfo",$addressInfo);

	}

	function setSessionPost($postId)
	{
		$sql="SELECT * FROM tbl_post_type WHERE id=?";
		$postInfo = $this->doSelect($sql,array($postId),1);

		$postInfo=serialize($postInfo);
		self::sessionInit();
		self::sessionSet("postInfo",$postInfo);

	}

	function deleteAddress($addressId)
	{
		$sql="delete from tbl_user_address where id=?";
		$this->doQuery($sql,array($addressId));
	}

}










































