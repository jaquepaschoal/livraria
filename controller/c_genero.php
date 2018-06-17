<?php
	include_once "funcao.php";
	class c_genero
	{
		function list() {
			$opcao = array("location"=>"http://localhost/livraria/services/generoServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$response = $cli->buscarTodosGeneros();
      $response2 = '';

			if($_POST) {
				$opcao = array("location"=>"http://localhost/livraria/services/livroServico.php","uri"=>"http://localhost/");
				$cli = new soapClient(null,$opcao);
				$response2 = $cli->buscarLivroPorGenero($_POST["generos"]);
			}

			require_once "view/list_genero.php";
    }

    function listAll() {
      require_once "lib/nusoap.php";
      $cli = new nusoap_client("http://localhost/livraria/services/generoServiconusoap.php?wsdl");
      $response = $cli->call("generoServico.buscarTodosGeneros");
      $response = json_decode($response);
			require_once "view/listAll_genero.php";
    }
    
    function insert()
    {
      $response3 = '';
      
      if($_POST) {
        $descricao = $_POST['descricao'];
        $opcao = array("location"=>"http://localhost/livraria/services/generoServico.php","uri"=>"http://localhost/");
        $cli = new soapClient(null,$opcao);
        $response3 = $cli->inserirGenero($descricao);
      }
      require_once "view/insert_genero.php";
    }

    function insertRest() {
      if($_POST) {
        $desc = urlencode($_POST['descricao']);
        $url = "http://localhost/livraria/services/generoServicoRest.php?acao=inserirGenero&desc=$desc";
        $response = file_get_contents($url);
        echo $response;
      }
      
      require_once "view/insert_genero.php";
    }
  }

?>