<?php
	include_once "funcao.php";
	class c_autor
	{
		function list() {
			$opcao = array("location"=>"http://localhost/livraria/services/autorServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$response = $cli->buscarTodosAutores();
			$response2 = '';

			if($_POST) {
				$opcao = array("location"=>"http://localhost/livraria/services/livroServico.php","uri"=>"http://localhost/");
				$cli = new soapClient(null,$opcao);
				$response2 = $cli->buscarLivroPorAutor($_POST["autores"]);
			}

			require_once "view/list_author.php";

		}

		function listAll() {
			$opcao = array("location"=>"http://localhost/livraria/services/autorServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$response = $cli->buscarTodosAutores();

			require_once "view/listAll_author.php";

		}
  }

?>