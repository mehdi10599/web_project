<?php
class Checkout extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index($orderId='')
	{
		if (isset($_GET['Authority']))
		{
			$orderInfo = $this->model_obj->zarinpalcheckout($_GET);
			$data=array("orderInfo"=>$orderInfo);
		}
		if (isset($orderId) and $orderId!="")
		{
			$orderInfo=$this->model_obj->getOrderInfo($orderId);
			$data=array("orderInfo"=>$orderInfo);
		}
		$this->view("checkout/index",$data);

	}

	function payonline($orderId)
	{
		$this->model_obj->payOnline($orderId);
	}

	function showerror()
	{
		$Error=$_GET['Error'];
		$orderId=$_GET['orderId'];
		$data=array("Error"=>$Error,"orderId"=>$orderId);
		$this->view("checkout/showerror",$data);
	}

	function creditcard($orderId)
	{
		if (isset($_POST['cardnumber']))
		{
			$this->model_obj->creditcard($_POST,$orderId);
		}
		$orderInfo=$this->model_obj->getorderInfo($orderId);
		$data=array("orderInfo"=>$orderInfo);
		$this->view("checkout/creditcard",$data);
	}


}

?>
