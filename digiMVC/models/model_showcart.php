<?php


class model_showcart extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getBasket()
	{
		return $this->getBasketInfo();
	}

	function deleteBasket($basketId)
	{
		$sql = "delete from tbl_basket where id=?";
		$this->doQuery($sql,array($basketId));
	}

	function updatebasket($data)
	{
		$tedad=$data['tedad'];
		$basketRow=$data['basketRow'];
		$sql="update tbl_basket set tedad=? where id=?";
		$this->doQuery($sql,array($tedad,$basketRow));
	}


}