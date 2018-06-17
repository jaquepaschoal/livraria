<?php
  require_once "../model/conexao.php";
  require_once "../model/genero_dao.php";
  require_once "../model/m_genero.php";

  class generoServico {

    function inserirGenero($descricao) {
      $genero = new m_genero(null, $descricao);
      $genero_dao = new genero_dao();
      $ret = $genero_dao -> insert($genero);
      return $ret;
    }
  }

  if(isset($_GET["acao"])) {
    if($_GET["acao"] === "inserirGenero") {
      $class = new generoServico();
      $class->inserirGenero($_GET["desc"]); 
    }
    exit();
  }