<?php
  require_once "../model/conexao.php";
  require_once "../model/editora_dao.php";
  $opcao = array("uri" => "http://localhost");
  $server = new soapServer(null,$opcao);

  class editoraServico {

    function buscarTodasEditoras() {
      $editora_dao = new editora_dao();
      $ret = $editora_dao-> all();
      return $ret;
    }
  }

  $server->setObject(new editoraServico());
  $server->handle(); 
?>