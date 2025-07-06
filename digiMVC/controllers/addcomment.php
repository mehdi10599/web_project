<?php
class Addcomment extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index($productId)
	{
		$params=$this->model_obj->getParams($productId);
		$productInfo = $this->model_obj->productInfo($productId);
		$commentInfo = $this->model_obj->getComment($productId);

		$data=array("params"=>$params,"productInfo"=>$productInfo,"commentInfo"=>$commentInfo);
		$this->view("addcomment/index",$data);
	}

	function savecomment($productId)
	{

		$this->model_obj->savecomment($_POST,$productId);
	}
}

?>
