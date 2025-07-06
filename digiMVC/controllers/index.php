<?php

class index extends Controller
{
	function __construct()
	{
//		echo "this is index class<br>";
	}

	public function index()
	{

		$slider1 = $this->model_obj->get_slider1();

		$slider2_array = $this->model_obj->get_slider2();

		$onlyDigi = $this->model_obj->onlyDigi();

		$porbazdid = $this->model_obj->porbazdid();

		$jadidtarin = $this->model_obj->jadidtarin();

		$slider2 = $slider2_array[0];

		$date_end = $slider2_array[1];

		$data = array( $slider1, $slider2, $date_end, $onlyDigi, $porbazdid, $jadidtarin );

		$this->view("index/index", $data);

	}


}


?>