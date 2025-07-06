<?php

class Login extends controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index($loginErr="")
	{
		$loginError=0;
		if (isset($loginErr))
		{
			if ($loginErr=="failed"){$loginError=1;}
		}
		$data = array("loginError"=>$loginError);
		$this ->view("login/index",$data);
	}

	function checkUser()
	{
		$this->model_obj->checkUser($_POST);
		$check=Model::sessionGet("userId");
		if ($check==false)
		{
			echo "login failed";
			header("location:".URL."login/index/failed");
		}
		else
		{
			echo "login success";
			header("location:".URL."panel");
		}
	}
}

?>
