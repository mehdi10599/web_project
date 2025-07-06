<?php

class index extends Controller
{
	function __construct()
	{
//		echo "this is index class<br>";
	}

	public function index()
	{



		$data = array(  );

		$this->view("index/index", $data);

	}


}


?>