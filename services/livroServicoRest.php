<?php
  require_once "../model/conexao.php";
  require_once "../model/livro_dao.php";
  require_once "../model/m_autor.php";
  require_once "../model/m_livro.php";
  require_once "../model/m_genero.php";
  require_once "../model/m_editora.php";


  class livroServico {

    function buscarTodosLivros() {
      $livro_dao = new livro_dao();
      $ret = $livro_dao-> all();
      return json_encode($ret);
    }
  }

  $class = new livroServico();
  
  if(isset($_GET["acao"])) {
    if($_GET["acao"] === "buscarTodosLivros") {
      $retorno = $class->buscarTodosLivros();

    }
    exit($retorno);
  }