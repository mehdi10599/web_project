<?php

class model_index extends model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_slider1()
	{
		$sql = "select * from tbl_slider_top";
		$res = $this->doSelect($sql);
		return $res;
	}

	function get_slider2()
	{
		$sql = "select * from tbl_product where special=1 limit 8";
		$res = $this->doSelect($sql);

		foreach ($res as $key => $val) {
			$discount_res = $this->calcDiscount($val['discount'], $val['price']);
			$res[ $key ]['finalprice'] = $discount_res[1];
		}

		$date_end = $this->calcFlipDateEnd($res[0]['time_special']);

		return [ $res, $date_end ];
	}


	function onlyDigi()
	{
		$sql = "select * from tbl_product where onlydigikala=1";
		$res =$this->doSelect($sql);

		return $res;
	}

	function porbazdid()
	{
		$limit = self::getoption()['limit_slider'];

		$sql = "select * from tbl_product order by viewed desc limit " . $limit . " ";
		$res =$this->doSelect($sql);

		return $res;
	}

	function jadidtarin()
	{
		$limit = self::getoption()['limit_slider'];

		$sql = "select * from tbl_product order by id desc limit " . $limit . " ";
		$res =$this->doSelect($sql);

		return $res;
	}

}

?>
