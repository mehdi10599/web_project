<?php

class Controller{


	function __construct()
	{

	}

	function view($viewURL,$data=array(),$noIncludeheader='',$noIncludefooter='')
	{
		if ($noIncludeheader=='')
		{
			require_once "header.php";
		}
		require_once "views/".$viewURL.".php";
		if ($noIncludefooter=='')
		{
			require_once "footer.php";
		}

	}

	function model($modelURL)
	{
		require_once "models/model_".$modelURL.".php";
		$className = "model_".$modelURL;
		$this->model_obj = new $className;

	}

}

?>
