<?php

class Showcart4 extends controller
{
	function __construct()
	{
	}

	function index($Status="")
	{
		$data=array("Status"=>$Status);
		$this ->view("showcart4/index",$data);
	}

	function codetakhfif($codeTakhfif)
	{
		$result=$this->model_obj->codeTakhfif($codeTakhfif);
		echo $result[0];
	}

	function getTotalPrice($code='')
	{
		$finalPrice=$this->model_obj->getTotalPrice($code);

		echo $finalPrice;
	}

	function saveorder()
	{
		$this->model_obj->saveOrder($_POST);
	}
}

?>
