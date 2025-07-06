<?php

class Showcart3 extends controller
{
	function __construct()
	{
	}

	function index()
	{
		$addressInfo = $this->model_obj->getAddressInfo();
		$postInfo = $this->model_obj->getpostInfo();
		$basketInfo=$this->model_obj->getBasket();

		$data=array("addressInfo"=>$addressInfo,"postInfo"=>$postInfo,"basketInfo"=>$basketInfo);
		$this ->view("showcart3/index",$data);
	}
}

?>
