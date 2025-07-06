<?php

class adminproduct extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$product = $this->model_obj->getProduct();
		$data = array( "product" => $product );
		$this->view("admin/adminproduct/index", $data);
	}

	function addproduct($productId = "")
	{

		if (isset($_POST['title']) && $_POST['title'] != "") {

			$this->model_obj->addProduct($_POST, $productId);
		}

		$all_category = $this->model_obj->getCategory();
		$all_color = $this->model_obj->getColor();
		$all_guaranty = $this->model_obj->getGuaranty();
		$productInfo = array();
		if ($productId != "") {
			$productInfo = $this->model_obj->getproductInfo($productId);
		}

		$data = array( "all_category" => $all_category, "all_color" => $all_color, "all_guaranty" => $all_guaranty, "productInfo" => $productInfo );
		$this->view("admin/adminproduct/addproduct", $data);
	}

	function deleteProduct()
	{
		$this->model_obj->deleteProduct($_POST['id']);
	}

	function naghd($productId)
	{

		$productInfo = $this->model_obj->getproductInfo($productId);
		$naghdInfo = $this->model_obj->getnaghdInfo($productId);

		$data = array( "naghInfo" => $naghdInfo, "productInfo" => $productInfo );
		$this->view("admin/adminproduct/naghd", $data);
	}

	function addnaghd($productId, $naghdId = '')
	{
		if (isset($_POST['title'])) {
			$this->model_obj->addnaghd($_POST, $productId, $naghdId);
		}
		$productInfo = $this->model_obj->getproductInfo($productId);
		$naghdRowInfo = $this->model_obj->getnaghdRowInfo($naghdId);

		$data = array( "productInfo" => $productInfo, "naghdRowInfo" => $naghdRowInfo );
		$this->view("admin/adminproduct/addnaghd", $data);
	}

	function deletenaghd($productId)
	{
		$this->model_obj->deletenaghd($_POST['id'], $productId);
	}

	function attr($categoryId, $productId)
	{
		if (isset($_POST['submited']))
		{
			$this->model_obj->addAttr($_POST,$productId);
		}

		$attr = $this->model_obj->getCategoryAttr($categoryId,$productId);
		$productInfo = $this->model_obj -> getproductInfo($productId);

		$data = array( "attr" => $attr , "productInfo"=>$productInfo);
		$this->view('admin/adminproduct/attr', $data);
	}

	function gallery($productId)
	{
		if (isset($_FILES['image']))
		{
			$this->model_obj->addgallery($productId,$_FILES['image']);
		}

		$productInfo = $this->model_obj ->getproductInfo($productId);
		$gallery = $this ->model_obj -> getGallery($productId);

		$data=array("productInfo"=>$productInfo,"gallery"=>$gallery);
		$this->view("admin/adminproduct/gallery",$data);
	}

	function deletegallery($productId)
	{
		$this->model_obj->deleteGallery($_POST['id']);

		header("location:".URL."adminproduct/gallery/".$productId);
	}

}

?>























