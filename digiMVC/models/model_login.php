<?php

class model_login extends model
{
	function __construct()
	{
		parent::__construct();
	}

	function checkUser($form)
	{
		$email = $form['email'];
		$password = $form['password'];

		$sql = "select * from tbl_user where email=? and password=?";
		$res = $this->doSelect($sql, array( $email, $password ));

		if (count($res) > 0 and !empty($email) and !empty($password)) {
			Model::sessionInit();
			Model::sessionSet("userId",$res[0]['id']);
		}

	}

}

?>
