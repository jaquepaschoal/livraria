<?php
	include_once "funcao.php";
	class c_livro
	{
		function home() {
			require_once 'view/home.php';
		}

		function list() {
			$opcao = array("location"=>"http://localhost/livraria/services/livroServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$response = $cli->buscarTodosLivros();
			require_once 'view/list_books.php';
		}

		function insert() {
			$opcao = array("location"=>"http://localhost/livraria/services/generoServico.php","uri"=>"http://localhost/");
			$cli = new soapClient(null,$opcao);
			$generos = $cli->buscarTodosGeneros();

			$opcao1 = array("location"=>"http://localhost/livraria/services/editoraServico.php","uri"=>"http://localhost/");
			$cli1 = new soapClient(null,$opcao1);
			$editoras = $cli1->buscarTodasEditoras();

			$opcao2 = array("location"=>"http://localhost/livraria/services/autorServico.php","uri"=>"http://localhost/");
			$cli2 = new soapClient(null,$opcao2);
			$autores = $cli2->buscarTodosAutores();

			if($_POST) {
				if($_POST['titulo'] && $_POST['autor'] && $_POST['editoras'] && $_POST['generos'] ) {
					$opcao3 = array("location"=>"http://localhost/livraria/services/livroServico.php","uri"=>"http://localhost/");
					$cli3 = new soapClient(null,$opcao3);
					$livro = $cli3->inserirLivro( $_POST['titulo'], $_POST['generos'], $_POST['editoras'], $_POST['autor']);
				}
			}

			require_once 'view/insert_books.php';
		}

		function listarLivrosRest () {
			$url = "http://localhost/livraria/services/livroServicoRest.php?acao=buscarTodosLivros";
			$response = file_get_contents($url);
			$response = json_decode($response);
			require_once 'view/list_books.php';
		}
  }

?>