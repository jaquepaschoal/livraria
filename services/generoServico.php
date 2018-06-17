<?php
  require_once "../model/conexao.php";
  require_once "../model/genero_dao.php";
  require_once "../model/m_genero.php";

  $opcao = array("uri" => "http://localhost");
  $server = new soapServer(null,$opcao);

  class generoServico {

    function buscarTodosGeneros() {
      $genero_dao = new genero_dao();
      $ret = $genero_dao-> all();
      return $ret;
    }

    function inserirGenero($descricao) {
      $genero = new m_genero(null, $descricao);
      $genero_dao = new genero_dao();
      $ret = $genero_dao -> insert($genero);
      return $ret;
    }
  }

  $server->setObject(new generoServico());
  $server->handle(); 

?>