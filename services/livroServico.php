<?php
  require_once "../model/conexao.php";
  require_once "../model/livro_dao.php";
  require_once "../model/m_autor.php";
  require_once "../model/m_livro.php";
  require_once "../model/m_genero.php";
  require_once "../model/m_editora.php";

  $opcao = array("uri" => "http://localhost");
  $server = new soapServer(null,$opcao);

  class livroServico {

    function buscarTodosLivros() {
      $livro_dao = new livro_dao();
      $ret = $livro_dao-> all();
      return $ret;
    }

    function buscarLivroPorAutor($idautor) {
      $autor = new m_autor($idautor);
      $livro = new m_livro(null,null,null,null,$autor);
      $livro_dao = new livro_dao;
      $ret = $livro_dao -> searchBookAuthor($livro);
      return $ret;
    }

    function buscarLivroPorGenero($idgenero) {
      $genero = new m_genero($idgenero);
      $livro = new m_livro(null,null,$genero,null,null);
      $livro_dao = new livro_dao;
      $ret = $livro_dao -> searchBookGenero($livro);
      return $ret;
    }

    function inserirLivro($titulo,$idgenero, $ideditora, $autores) {
      $genero = new m_genero($idgenero);
      $editora = new m_editora($ideditora);
      $autor = new m_autor($autores[0]);
      $livro = new m_livro(null,$titulo,$genero,$editora,$autor);
      if(count($autores) > 0) {
        for($x=1; $x<count($autores); $x++) {
          $autor1 = new m_autor($autores[$x]);
          $livro -> setAutor($autor1);
        }
      }
      $livro_dao = new livro_dao();
     
      $ret = $livro_dao -> insert($livro);
      return $ret;
    }
  }

  $server->setObject(new livroServico());
  $server->handle(); 

  // $c = new livroServico;
  // $retorno = $c->buscarLivroPorGenero(1);

  // echo "<pre>";
  // print_r($retorno);
  // echo "</pre>";
?>