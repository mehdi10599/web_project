<?php

class admincategory extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$category = $this->model_obj->getChildren(0);

		$data = array("category"=>$category);
		$this->view("admin/admincategory/index",$data);
	}

	function showchildren($idcategory)
	{
		$category = $this->model_obj->getChildren($idcategory);
		$parents=$this->model_obj->getParent($idcategory);
		$data = array("category"=>$category,"parents"=>$parents);
		$this->view("admin/admincategory/index",$data);
	}

	function addCategory($id="0",$edit='')
	{
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
			$parent = $_POST['parent'];
			$this->model_obj->addCategory($title,$parent,$edit,$id);
		}
		$category = $this->model_obj->getCategory();
		$categoryInfo= $this->model_obj->categoryInfo($id);
		$data = array($category,$id,$edit,$categoryInfo);

		$this->view("admin/admincategory/addcategory",$data);
	}

	function deleteCategory($idcategory)
	{
		$ids=$_POST['id'];
		$this->model_obj->deleteCategory($ids,$idcategory);
	}

	function showattr($categoryId,$parentId=0)
	{
		$attr=$this->model_obj->getAttr($categoryId,$parentId);
		$categoryInfo = $this->model_obj->categoryInfo($categoryId);
		$parentAttrInfo=$this->model_obj->getAttrInfo($parentId);

		$data=array("attr"=>$attr,"categoryInfo"=>$categoryInfo,"parentAttrInfo"=>$parentAttrInfo);
		$this->view("admin/admincategory/showattr",$data);
	}

	function addattr($categoryId,$parentId=0,$editId="")
	{
		$categoryInfo = $this->model_obj->categoryInfo($categoryId);
		$mainattr=$this->model_obj->getAttr($categoryId,0);
		$attrInfo = $this->model_obj->getAttrInfo($editId);
		$parentInfo = $this->model_obj->getAttrInfo($parentId);
		if (isset($_POST['title']))
		{
			$this->model_obj->addattr($_POST,$categoryId,$parentId,$editId);
		}


		$data=array("categoryInfo"=>$categoryInfo,"mainattr"=>$mainattr,"parentId"=>$parentId,"attrInfo"=>$attrInfo,"parentInfo"=>$parentInfo);
		$this->view("admin/admincategory/addattr",$data);
	}

	function deleteattr($categoryId,$parentAttrId)
	{
		$this->model_obj->deleteAttr($_POST['id'],$categoryId,$parentAttrId);
//
	}

}
?>
