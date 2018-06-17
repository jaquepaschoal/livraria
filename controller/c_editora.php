<?php
	include_once "funcao.php";
	class c_editora
	{
		function list() {
			$opcao = array("location"=>"http://localhost/livraria/services/editoraServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$response = $cli->buscarTodasEditoras();
			$response2 = '';

			if($_POST) {
				require_once "lib/nusoap.php";
				$cli = new nusoap_client("http://localhost/livraria/services/livroServiconusoap.php?wsdl");
				$response2 = $cli->call("livroServico.buscarLivroPorEditora", array('ideditora'=> $_POST["editoras"]));
				$response2 = json_decode($response2);
			}
			require_once "view/list_editor.php";
    }
  }