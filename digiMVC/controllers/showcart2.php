<?php

class Showcart2 extends controller
{
	function __construct()
	{
	}

	function index()
	{
		$useraddressInfo=$this->model_obj->getUserAddress();
		$posttypeInfo=$this->model_obj->getPostType();

		$data = array("useraddressInfo"=>$useraddressInfo,"posttypeInfo"=>$posttypeInfo);
		$this ->view("showcart2/index",$data);

	}

	function addAddress($editAddressId='')
	{
		$this->model_obj->addAddress($_POST,$editAddressId);
	}

	function getaddressInfo($addressId)
	{
		$addressInfo=$this->model_obj->getaddressInfo($addressId);

		echo json_encode($addressInfo);
	}

	function setSessionAddress($addressId)
	{
		$this->model_obj->setSessionAddress($addressId);
	}

	function setSessionPost($postId)
	{
		$this->model_obj->setSessionPost($postId);
	}

	function deleteaddress($addressId)
	{
		$this->model_obj->deleteAddress($addressId);
	}
}

?>
