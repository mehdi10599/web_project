<?php

class Showcart extends controller
{
	function __construct()
	{
	}

	function index()
	{
		$basketInfo = $this->model_obj->getBasket();
		$basket=$basketInfo[0];
		$totalPriceAll=$basketInfo[1];

		$data = array( "basket" => $basket,"totalPriceAll"=>$totalPriceAll );
		$this->view("showcart/index", $data);
	}

	function deletebasket($basketId)
	{
		$this->model_obj->deleteBasket($basketId);
		$basketInfo = $this->model_obj->getBasket();

		echo json_encode($basketInfo);
	}

	function updatebasket()
	{
		$this->model_obj->updatebasket($_POST);
		$basketInfo = $this->model_obj->getBasket();

		echo json_encode($basketInfo);
	}
}

?>
