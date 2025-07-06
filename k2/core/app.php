<?php

class App
{
	public $controller = "index";
	public $method = "index";
	public $params = array();

	function __construct()
	{
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = $this->parseURL($url);
			$this->controller = $url[0];
			unset($url[0]);
			if (isset($url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
			$this->params = array_values($url);
		}
		$controller_adres = "controllers/" . $this->controller . ".php";
		if (file_exists($controller_adres)) {
			require_once $controller_adres;
			$object = new $this->controller;
			$object->model($this->controller);
			if (method_exists($object, $this->method)) {
				call_user_func_array([ $object, $this->method ], $this->params);
			}
			else {
				echo "method does not exist!";
			}
		}
		else {
			echo "controller does not exist!";
		}

	}

	function parseURL($url)
	{
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = trim($url, "/");
		$url = explode("/", $url);
		return $url;
	}
}
