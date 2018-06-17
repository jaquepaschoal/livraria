<?php
  require_once "../model/conexao.php";
  require_once "../model/livro_dao.php";
  require_once "../model/m_livro.php";
  require_once "../model/m_editora.php";
  require_once "../lib/nusoap.php";

  $server = new nusoap_server();
  $server->configureWSDL("livroServico");
  $server->wsdl->schemaTargetNamespace = "urn:livroServico";


  class livroServico {

    function buscarTodoslivros() {
      $livro_dao = new livro_dao();
      $ret = $livro_dao-> all();
      return json_encode($ret);
    }

    function inserirlivro($descricao) {
      $livro = new m_livro(null, $descricao);
      $livro_dao = new livro_dao();
      $ret = $livro_dao -> insert($livro);
      return $ret;
    }

    function buscarLivroPorEditora($ideditora) {
      $editora = new m_editora($ideditora);
      $livro = new m_livro(null,null,null,$editora,null);
      $livro_dao = new livro_dao;
      $ret = $livro_dao -> searchBookeditora($livro);
      return json_encode($ret);
    }
  }

  // $livro = new livroServico;
  // var_dump($livro->buscarLivroPorEditora(1));

  $server->register("livroServico.buscarLivroPorEditora",
                    array('ideditora' => 'xsd:int'),
                    array("retorno"=>"xsd:string"),
                    "urn:livroServico",
                    "urn:livroServico#buscarLivroPorEditora",
                    "rpc",
                    "encode",
                    "Busca todos os livros"
  );
  $chamada = file_get_contents("php://input");
  $server->service($chamada);
?>