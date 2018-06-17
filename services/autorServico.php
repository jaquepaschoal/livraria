<?php
  require_once "../model/conexao.php";
  require_once "../model/autor_dao.php";
  $opcao = array("uri" => "http://localhost");
  $server = new soapServer(null,$opcao);

  class autorServico {

    function buscarTodosAutores() {
      $autor_dao = new autor_dao();
      $ret = $autor_dao-> all();
      return $ret;
    }
  }

  $server->setObject(new autorServico());
  $server->handle(); 

?>