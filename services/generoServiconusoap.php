<?php
  require_once "../model/conexao.php";
  require_once "../model/genero_dao.php";
  require_once "../model/m_genero.php";
  require_once "../lib/nusoap.php";

  $server = new nusoap_server();
  $server->configureWSDL("generoServico");
  $server->wsdl->schemaTargetNamespace = "urn:generoServico";


  class generoServico {

    function buscarTodosGeneros() {
      $genero_dao = new genero_dao();
      $ret = $genero_dao-> all();
      return json_encode($ret);
    }

    function inserirGenero($descricao) {
      $genero = new m_genero(null, $descricao);
      $genero_dao = new genero_dao();
      $ret = $genero_dao -> insert($genero);
      return $ret;
    }
  }

  $server->register("generoServico.buscarTodosGeneros",
                    array(),
                    array("retorno"=>"xsd:string"),
                    "urn:generoServico",
                    "urn:generoServico#buscarTodosGeneros",
                    "rpc",
                    "encode",
                    "Busca todos os generos"
  );
  $chamada = file_get_contents("php://input");
  $server->service($chamada);
?>