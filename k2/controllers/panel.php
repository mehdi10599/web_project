<?php
class Panel extends controller
{
	public $checklogin = "";
	function __construct()
	{
		parent::__construct();
		Model::sessionInit();
		$this->checklogin = Model::sessionGet("userId");
		if ($this->checklogin == false)
		{
			header("location:".URL."login");
		}
	}
	function index()
	{
		$userInfo=$this->model_obj->getuserInfo();
		$statInfo=$this->model_obj->getStat();
		$message=$this->model_obj->getMessage();
		$order=$this->model_obj->getOrder();
		$folder=$this->model_obj->getFolder();
		$comments=$this->model_obj->getCommets();

		$data=array("userInfo"=>$userInfo,"statInfo"=>$statInfo,"message"=>$message,"order"=>$order,"folder"=>$folder,"comments"=>$comments);
		$this->view("panel/index",$data);
	}

	function getfavorit()
	{
		$folderId=$_POST['folderId'];
		$folderItems=$this->model_obj->getFavorit($folderId);
		echo json_encode($folderItems);
	}

	function saveEdit()
	{
		$folderId=$_POST['folderId'];
		$title=$_POST['title'];
		echo $title;
		$this->model_obj->saveEdit($folderId,$title);
	}

	function deleteFavorit()
	{
		$favoritId=$_POST['favoritId'];
		$this->model_obj->deleteFavorit($favoritId);
	}

	function deleteComment($idComment)
	{
		$this->model_obj->deleteComment($idComment);

	}
}

?>






















