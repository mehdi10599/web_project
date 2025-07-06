<?php


class Product extends controller
{
	function __construct()
	{
//		echo "this is user class<br>";
	}

	public function index($id,$activeTab=2)
	{
		$productinfo = $this->model_obj->product_info($id);

		if ($productinfo!=false) {

			$onlydigi = $this->model_obj->onlyDigi();

			$gallery = $this->model_obj->getgallery($id);

			$data = array( "productinfo" => $productinfo, "onlyDigi" => $onlydigi, "gallery" => $gallery , "activeTab"=>$activeTab );

			$this->view("product/index", $data);
		}
		else
		{
			header("location:".URL."index/index");
		}
	}

	function tab($id,$idcategory)
	{
		$index=$_POST['index'];

		if ($index==0)
		{
			$viewURL = 'product/tab1';

			$naghd_info = $this->model_obj->naghd_info($id);

			$data=array($naghd_info);

			$this->view($viewURL,$data,1,1);
		}

		if ($index==1)
		{
			$viewURL = 'product/tab2';

			$fanni = $this->model_obj->fanni($idcategory,$id);

			$data=array($fanni);

			$this->view($viewURL,$data,1,1);
		}

		if ($index==2)
		{
			$viewURL = 'product/tab3';
			$comment_param = $this->model_obj->comment_param($idcategory);
			$getcomments = $this->model_obj->getcomments($id);
			$comments=$getcomments[0];
			$comments_avg=$getcomments[1];
			$data=array($comment_param,$comments,$comments_avg);

			$this->view($viewURL,$data,1,1);
		}

		if ($index==3)
		{
			$viewURL = 'product/tab4';
			$getquestions = $this->model_obj->getquestion($id);
			$questions=$getquestions[0];
			$answers=$getquestions[1];
			$data=array($questions,$answers);

			$this->view($viewURL,$data,1,1);
		}






	}

	function addtobasket($productId,$colorId="",$guarantyId="")
	{

		$this->model_obj->addToBasket($productId,$colorId,$guarantyId);

	}

}