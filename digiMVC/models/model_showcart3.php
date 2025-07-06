<?php


class model_showcart3 extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getAddressInfo()
	{
		self::sessionInit();
		$addressInfo=self::sessionGet("addressInfo");
		$addressInfo=unserialize($addressInfo);
		return $addressInfo;
	}

	function getPostInfo()
	{
		$postInfo=self::sessionGet("postInfo");
		$postInfo=unserialize($postInfo);
		return $postInfo;
	}

	function getBasket()
	{
		return $this->getBasketInfo();
	}
}










































