<?php
	if ($_GET)
	{
		$controller = $_GET['controller'];
		$method = $_GET["method"];
		require_once "controller/" . $controller. ".php";
		$obj = new $controller();
		$obj->$method();
	}
	else
	{
		require_once "controller/c_livro.php";
		$ini = new c_livro();
		$ini->home();
	}
?>